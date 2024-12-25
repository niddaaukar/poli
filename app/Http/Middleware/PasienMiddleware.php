<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PasienMiddleware
{
    /**
     * Menangani permintaan yang masuk untuk memastikan pengguna adalah pasien yang terautentikasi.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika pengguna sudah login sebagai pasien menggunakan guard 'pasien'
        if (Auth::guard('pasien')->check()) {
            // Jika sudah login sebagai pasien, lanjutkan permintaan ke aplikasi
            return $next($request);
        }

        // Jika pengguna belum login sebagai pasien, arahkan ke halaman login
        return redirect()->route('login')
            ->with([
                'message' => 'Anda harus login sebagai pasien untuk mengakses halaman ini', // Pesan untuk memberitahu bahwa login diperlukan
                'alert-type' => 'error' // Jenis alert error untuk memberi tahu pengguna mereka belum login sebagai pasien
            ]);
    }
}
