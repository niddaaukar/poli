<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class DokterMiddleware
{
    /**
     * Menangani permintaan yang masuk untuk memverifikasi apakah pengguna adalah dokter.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah login sebagai dokter
        if (Auth::guard('dokter')->check()) {
            // Jika pengguna adalah dokter, lanjutkan permintaan ke aplikasi
            return $next($request);
        }

        // Jika pengguna bukan dokter, redirect ke halaman login
        // dan menampilkan pesan bahwa pengguna harus login sebagai dokter untuk mengakses halaman tersebut
        return redirect()->route('login')
            ->with([
                'message' => 'Silahkan login sebagai dokter untuk mengakses halaman ini', // Pesan error jika bukan dokter
                'alert-type' => 'error' // Jenis alert error untuk menunjukkan masalah
            ]);
    }
}
