<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * 
 * Controller untuk menangani autentikasi pengguna
 */
class AuthController extends Controller
{
    /**
     * Login
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {
        // Validasi input credentials user
        $credentials = $request->validate([
            'email' =>  'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->role != 'admin') {
            return back()->withErrors([
                'email' => 'You have no premission to access this.',
            ])->onlyInput('email');
        }

        // Validasi credentials
        if (Auth::attempt($credentials)) {
            // Regenerasi session
            $request->session()->regenerate();
            
            // Redirect ke halaman utama
            return redirect()->intended('/');
        }

        // Jika credentials tidak valid, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logout
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
