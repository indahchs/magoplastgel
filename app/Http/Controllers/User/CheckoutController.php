<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShipmentItemsResource;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Str;

class CheckoutController extends Controller
{

    public function productPage() {
        // Mengambil semua produk dengan relasi gambar produk
        $product = Product::with('productImages')->first();

        // Mengembalikan view daftar produk dengan data produk
        return view('pages.user.product', [
            'type_menu' => 'product',
            'product' => $product
        ]);

        // return  $product;
    }

    public function saveOrder(Request $request, Product $product) {

        $validator = Validator::make($request->all(), [
            'quantity'=> 'required|integer'
        ]);

        $quantity = $request->quantity;

        // Jika validasi tidak berhasil, kembali ke halaman sebelumnya dengan pesan error
        if ($validator->fails() || $quantity <= 0) {
            return redirect()->route('user.product')->with('error', 'Jumlah produk tidak sesuai.');
        }
        if ($quantity >= $product->stock) {
            return redirect()->route('user.product')->with('error', 'Jumlah produk melebihi stok yang tersedia.');
        }

        $product = Product::with('productImages')->findOrFail($product->id);

        // $product->quantity = $quantity;

        // Check ShippingRates
        $shippingInfo = $this->shippingInfo($request, $quantity);

        // Pastikan $shippingInfo tidak null
        if ($shippingInfo === null) {
            return null;
        } else {

            // Mengambil data asli dari JsonResponse
            $shippingInfo = $shippingInfo->getData(true); // true untuk mendapatkan data dalam bentuk array

            // Memeriksa apakah status adalah true
            if (isset($shippingInfo['status']) && $shippingInfo['status'] === true) {

                $courierRates = $shippingInfo['price'];
                $courierCode = $shippingInfo['courier'];

                $orderId = $this->generateOrderId();

                // save order to cart
                DB::beginTransaction();

                $user = Auth::user();
                $order = Order::with('orderItems.product') // Memuat relasi orderItems dan product
                        ->where('user_id', $user->id)
                        ->where('status', 'cart')
                        ->first();

                if (!$order) {
                    // Jika order tidak ditemukan, buat order baru
                    $order = new Order();
                    $order->user_id = $user->id;
                    $order->order_number = $orderId;
                    $order->status = "cart";
                    $order->shipping_cost = $courierRates;
                    $order->courier = $courierCode;
                    $order->save();
                } else {
                    // Update informasi order jika sudah ada
                    $order->shipping_cost = $courierRates;
                    $order->courier = $courierCode;
                    $order->updated_at = now();
                    $order->save();
                }

                // Cek apakah order item sudah ada untuk produk yang sama
                $orderExist = $order->orderItems()->count();

                if (!$orderExist) {
                    // Jika order item tidak ditemukan, buat yang baru
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $product->id;
                    $orderItem->quantity = $quantity;
                    $orderItem->price = $product->price;
                    $orderItem->save();

                } else {
                    // Jika sudah ada, update kuantitas dan harga (jika perlu)
                    $orderItem = $order->orderItems()->first();
                    $orderItem->product_id = $product->id;
                    $orderItem->quantity = $quantity;
                    $orderItem->price = $product->price;
                    $orderItem->updated_at = now();
                    $orderItem->save();
                }

                // Update Qty Product
                $product->stock -= $quantity;
                $product->save();


                DB::commit();

                return redirect()->route('user.checkout.get');

            } else {
                return redirect()->route('user.product')->with('error', 'Terjadi kesalahan, silahkan coba kembali.');

                // return response()->json([
                //     'status' => false,
                //     'message' => 'Biteship API not responding.',
                //     'data' => $shippingInfo,
                // ]);


            }
        }

    }

    public function checkoutPage() {

        try {
            $user = Auth::user();
            $order = Order::with(['orderItems.product.productImages']) // Memuat order items beserta detail produk
                ->where('user_id', $user->id)
                ->where('status', 'cart')
                ->firstOrFail();

            if(!$order) {
                return redirect()->route('user.product')->with('error', 'Order cart tidak ditemukan.');
            }

            // return response()->json($order);

            return view('pages.user.checkout', compact( 'order'));

        } catch (\Throwable $th) {
            return redirect()->route('user.product')->with('error', 'Terjadi kesalahan silahkan coba kembali.');

        }

    }

    public function payment(){

        $user = Auth::user();
        $order = Order::with(['orderItems.product.productImages']) // Memuat order items beserta detail produk
                ->where('user_id', $user->id)
                ->where('status', 'cart')
                ->firstOrFail();

        $totalPayment = ($order->orderItems[0]->product->price) * ($order->orderItems[0]->quantity) + ($order->shipping_cost);
        $orderNumber = $order->order_number;

        // Midtrans Integration
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = Config::get('app.midtrans_server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderNumber,
                'gross_amount' => $totalPayment,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone_number,
            ),
        );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);

        try {

            // Request payment midtrans
            $auth = base64_encode(Config::get('app.midtrans_server_key').":");

            $response = Http::withHeaders([
                'content-type' => 'application/json',
                'authorization' => 'Basic '.$auth,
            ])->post("https://app.midtrans.com/snap/v1/transactions", $params);

            $response = json_decode($response->body());
            $snapToken = $response->token;

            // Redirect if midtrans not integrated
            if(!isset($snapToken) || empty($snapToken)){
                return redirect()->route('user.product')->with('error', 'Terjadi kesalahan, silahkan coba kembali.');
            }

            DB::beginTransaction();

            $order->status = "pending";
            $order->save();

            // Save to transaction table
            $transaction = new Transaction();
            $transaction->order_id = $order->id;
            $transaction->transaction_id = $orderNumber;
            $transaction->gross_amount = $totalPayment;
            $transaction->transaction_time = Carbon::now();
            $transaction->midtrans_response = $snapToken;
            $transaction->save();

            DB::commit();

            // Validation order status
            $orderStatus = $order->status;
            $isPaid = false;

            if(in_array($orderStatus, ['capture','settlement'])){
                $isPaid = true;
            }

            $encryptedOrderNumber = encrypt($orderNumber);
            // return $encryptedOrderNumber;

            return redirect('/product/checkout/payment/'.$encryptedOrderNumber);

        } catch (\Throwable $th) {
            DB::rollBack();
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Midtrans API not responding.',
            // ]);
            return redirect()->route('user.product')->with('error', 'Terjadi kesalahan, silahkan coba kembali.');

        }

    }

    public function paymentPage($orderNumber=null) {

        // Check if order number is missing, then redirect with an error message
        if (!$orderNumber) {
            return redirect()->route('user.product')->with('error', 'Pesanan tidak ditemukan.');
        }

        $orderNumber =  decrypt($orderNumber);

        $user = Auth::user();
        $transaction = Transaction::where('transaction_id', $orderNumber)
                ->firstOrFail();

        $isPaid = false;
        $transactionStatus = $transaction->transaction_status;

        if(in_array($transactionStatus, ['capture','settlement'])){
            $isPaid = true;
        }

        return view('pages.user.payment', [
            'totalPayment' => $transaction->gross_amount,
            'snapToken' => $transaction->midtrans_response,
            'isPaid' => $isPaid
        ]);


        // return view('pages.user.payment', compact('totalPayment', 'snapToken','isPaid'));


    }

    public function webhookPayment(Request $request) {

        // Request payment midtrans
        $transactionStatuses = ['capture', 'settlement', 'pending', 'cancel', 'expired'];

        $transactionId = $request->order_id;
        $transactionStatus = $request->transaction_status;

        try {

            $transactionInfo = Transaction::where('transaction_id', $transactionId)->firstOrFail();
            $orderInfo = Order::where('order_number', $transactionId)->firstOrFail();

            if(in_array($transactionStatus, $transactionStatuses) && $transactionStatus !== 'pending'){
                $transactionInfo->transaction_status = $transactionStatus;
                $transactionInfo->save();

            }

            if($transactionStatus === 'settlement' || $transactionStatus === 'capture') {
                $orderInfo->status = 'paid';
                $orderInfo->save();
                return "Sukses melakukan pembayaran";

            } else {
                return "Belum sukses melakukan pembayaran, statusnya: ".$transactionStatus;
            }

        } catch (\Throwable $th) {
            //throw $th;
            return "Unfinish -> ".$th->getMessage();
        }


    }

    public function notification(String $statusParameter) {

        $orderId = request()->query('order_id');
        $statusCode = request()->query('status_code');
        $transactionStatus = request()->query('transaction_status');


        // Daftar status pembayaran yang valid
        $urlStatus = ['success', 'fail', 'error'];

        // Validasi statusParameter
        if (!in_array($statusParameter, $urlStatus)) {
            return redirect()->route('user.profile.order')->with('error', 'Transaksi tidak ditemukan.');
            // return response()->json([
            //     'success' => false,
            //     'status' => 'error',
            //     'message' => 'Status pembayaran tidak valid'
            // ], 404);
        }

        // $transaction_status = $request->transaction_status;

        $transaction = Transaction::where('transaction_id', $orderId)->first();

        if (!$transaction) {
            return redirect()->route('user.profile.order')->with('error', 'Transaksi tidak ditemukan.');

            // return response()->json([
            //     'success' => false,
            //     'status' => 'error',
            //     'message' => 'Transaksi tidak ditemukan'
            // ]);
        }

        if ($transactionStatus == 'settlement' || $transactionStatus == 'capture') {

            return view('pages.user.success');

            // return response()->json([
            //     'success' => true,
            //     'status' => 'success',
            //     'message' => 'Berhasil melakukan pembayaran'
            // ]);

        } else {
            return view('pages.user.fail');

            // return response()->json([
            //     'success' => false,
            //     'status' => 'false',
            //     'message' => 'Gagal melakukan pembayaran'
            // ]);
        }

    }


    public function shippingInfo(Request $request, int $quantity){

        // Jika validasi tidak berhasil, kembali ke halaman sebelumnya dengan pesan error
        if ( $quantity <= 0) {
            return redirect()->route('user.product')->with('error', 'Jumlah produk tidak sesuai.');
        }

        $product = Product::first();
        $apiKeyBiteship = Config::get('app.api_key_biteship');

        $product->quantity = $quantity;

        $items = (new ShipmentItemsResource($product))->toArray($request);

        // dd($items);

        try {
            $customerInfo = User::findOrFail(Auth::user()->id);
            $customerAddress = "$customerInfo->kecamatan, $customerInfo->city, $customerInfo->province";

            $response = Http::withHeaders([
                'content-type' => 'application/json',
                'authorization' => $apiKeyBiteship,
            ]);

            // Origin Adress
            $getOrigin = $response->get('https://api.biteship.com/v1/maps/areas', [
                'countries' => 'ID',
                'input' => 'Babakan, Bogor Tengah, Kota Bogor. 16128',
                'type' => 'single'
            ]);

            $origin = json_decode($getOrigin->body());

            $originId =  $origin->areas[0]->id;

            // Destination Address
            $getDestination = $response->get('https://api.biteship.com/v1/maps/areas', [
                'countries' => 'ID',
                'input' => $customerAddress,
                'type' => 'single'
            ]);

            $destination = json_decode($getDestination->body());

            $destinationId =  $destination->areas[0]->id;

            $courierOptions = $response->post('https://api.biteship.com/v1/rates/couriers', [
                'origin_area_id' => $destinationId,
                'destination_area_id' => $originId,
                'origin_postal_code' => 16128,
                'destination_postal_code' => $customerInfo->zip_code,
                'couriers' => 'jne',
                'items' => $items
            ]);

            $courierOptions = json_decode($courierOptions);
            $courier = $courierOptions->pricing[0]->price;
            $courierCode = $courierOptions->pricing[0]->courier_code;

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengecek ongkos kirim.',
                'price' => ($courier),
                'courier' => ($courierCode)
            ], 200);


        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => 'Gagal mengecek ongkos kirim.',
                'data' => $th->getMessage()
            ], 201);
        }
    }

    function generateOrderId() {

        // Generate 3 random uppercase letters
        $letters = '';
        while (strlen($letters) < 3) {
            $char = strtoupper(Str::random(1));
            if (ctype_alpha($char)) {  // Check if the character is a letter
                $letters .= $char;
            }
        }

        // Generate 8 random numbers
        $numbers = rand(10000000, 99999999);

        $result = $letters ."-". $numbers;

        // Combine the letters and numbers
        return $result;
    }
}
