<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Dosen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna terautentikasi
        if (!Auth::check()) {
            return redirect()->route('login'); // Ganti dengan rute login Anda
        }

        // Cek apakah pengguna memiliki role 'dosen'
        if (Auth::user()->role == 'dosen') {
            return $next($request);
        }

        abort(403); // Forbidden
    }
}
