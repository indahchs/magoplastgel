<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Facade as Indonesia;


class AuthController extends Controller
{
    //
    public function loginPage() {
        if(Auth::user()){
            return redirect("/");
        }
        return view('pages.user.auth.auth-login', [
            'type_menu' => 'login'
        ]);
    }

    public function login(Request $request) {
        // Validasi input credentials user
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Validasi credentials
        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // Periksa jika role user adalah 'user'
            if ($user->role === 'user') {
                // Regenerasi session untuk keamanan
                $request->session()->regenerate();
                // return Auth::user();

                // Jika ada URL tujuan dari middleware, redirect ke sana
                return redirect()->intended('/'); // Fallback ke '/' jika tidak ada URL tujuan
            } else {
                // Logout jika role bukan 'user'
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have permission to access this application.',
                ])->onlyInput('email');
            }
        }

        // Jika credentials tidak valid, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registerIndex(){
        auth()->logout();

        $provinces = Indonesia::allProvinces();

        return view('pages.user.auth.auth-register', [
            'provinces' => $provinces,
            'type_menu' => 'register'
        ]);
    }

    public function registerStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'email'=> 'required|email|unique:users,email',
            'phone_number'=> 'required|integer|digits_between:11,14',
            'province'=> 'required|string',
            'city'=> 'required|string',
            'kecamatan'=> 'required|string',
            'kelurahan'=> 'required|string',
            'zip_code'=> 'required|integer|digits:5',
            'address_detail'=> 'required|string',
        ]);

        // Validasi format form register
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->province = $request->province;
            $user->city = $request->city;
            $user->kecamatan = $request->kecamatan;
            $user->kelurahan = $request->kelurahan;
            $user->zip_code = $request->zip_code;
            $user->address_detail = $request->address_detail;
            $user->password =  Hash::make($request->password);
            $user->role = 'user';
            $user->save();

            return redirect()->route('user.login.index')->with('status', 'Berhasil mendaftarkan akun, silahkan masuk dengan akun Anda.');

        } catch (\Throwable $th) {
            // return response()->json([
            //     'status' => false,
            //     'message' => $th->getMessage()
            // ]);
            return back();

        }


    }

    public function logout(Request $request)
    {
        // Logout user
        auth()->logout();

        // Hapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return redirect('/');
    }


}
