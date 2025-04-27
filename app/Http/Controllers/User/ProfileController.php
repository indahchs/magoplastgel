<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Facade as Indonesia;


class ProfileController extends Controller
{
    public function index(){
        $provinces = Indonesia::allProvinces();

        return view('pages.user.profile.index', [
            'type_menu' => 'dashboard',
            'provinces'=> $provinces
        ]);
    }


    public function orderIndex() {
        Carbon::setLocale('id');
        $user = Auth::user();

        $orders = Order::with(['user', 'orderItems.product.productImages', 'transaction'])
                ->where('user_id','=', $user->id)
            ->where('status', '!=', 'cart')
                ->get()->groupBy('status');

        foreach($orders as $order){
            $order[0]['created_at_formatted'] = $order[0]['created_at']->toDayDateTimeString();
            $order[0]['snap_token'] = $order[0]['transaction']['midtrans_response'];
            // $snapToken = $order[0]['transaction']['midtrans_response'];
        }

        // return json_decode($orders);


        return view('pages.user.profile.order.index', [
            'type_menu' => 'pesanan',
            'orders' => $orders,
        ]);

    }


    public function updateUser(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'email'=> 'required|email|unique:users,email,' . Auth::user()->id,
            'phone_number'=> 'required|integer|digits_between:11,14',
            'province'=> 'required|string',
            'city'=> 'required|string',
            'kecamatan'=> 'required|string',
            'kelurahan'=> 'required|string',
            'zip_code'=> 'required|integer|digits:5',
            'address_detail'=> 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail(Auth::user()->id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->province = $request->province;
            $user->city = $request->city;
            $user->kecamatan = $request->kecamatan;
            $user->kelurahan = $request->kelurahan;
            $user->zip_code = $request->zip_code;
            $user->address_detail = $request->address_detail;
            $user->save();
        }

        return back();
    }
}
