<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Jika user sudah login, lanjutkan request
        if ($user) {
            return $next($request);
        }

        // Jika user belum login, redirect ke halaman login dan simpan URL tujuan
        // return redirect()->guest(route('user.login.index'))->with('url.intended', $request->url());
        // Simpan URL tujuan ke session secara otomatis oleh Laravel
        return redirect()->guest(route('user.login.index'));
    }

}
