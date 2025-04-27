<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class OrderController extends Controller
{
    public function index() {

        $orders = Order::with(['user', 'orderItems.product.productImages', 'transaction'])->get()->groupBy('status');

        return view('pages.admin.order.order-list', [
            'type_menu' => 'order',
            'orders' => $orders,
        ]);
    }

    public function sent(Order $order, Request $request) {
        if ($order->status == 'paid') {
            $data = $request->validate([
               'courier' => 'required|string|max:10',
               'resi' => 'required|string|max:32' 
            ]);

            $response = Http::withHeaders([
                'content-type' => 'application/json',
                'authorization' => Config::get('app.api_key_biteship'),
            ]);

            $getTracking = $response->get('https://api.biteship.com/v1/trackings/'. $data['resi'] . '/couriers/' . $data['courier']);

            $tracking = json_decode($getTracking->body());

            if ($tracking->success) {
                $order->status = 'shipped';
                $order->courier = $data['courier'];
                $order->tracking_number = $data['resi'];
                $order->save();

                // Flash tost success
                $request->session()->flash('success', 'Berhasil merubah status pesanan');
            }

            else {
                // Flash toast fail
                $request->session()->flash('fail', 'Status pesanan gagal dirubah. Periksa kembali nomer resi.');
            }

        }
        
        return redirect()->back();
    }

    public function track(Order $order) {
        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => Config::get('app.api_key_biteship'),
        ]);

        $getTracking = $response->get('https://api.biteship.com/v1/trackings/'. $order->tracking_number . '/couriers/' . $order->courier);

        $tracking = json_decode($getTracking->body());

        return response()->json([
            'success' => $tracking->success,
            'data' => $tracking
        ]);
    }

    public function finish(Order $order){
        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => Config::get('app.api_key_biteship'),
        ]);

        $getTracking = $response->get('https://api.biteship.com/v1/trackings/'. $order->tracking_number . '/couriers/' . $order->courier);

        $tracking = json_decode($getTracking->body());

        if ($tracking->status == 'delivered') {
            $order->status = 'arrived';
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Order has been arrived'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Order has not been arrived'
        ], 400);
    }
}
