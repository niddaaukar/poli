<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Menangani permintaan yang masuk untuk memverifikasi apakah pengguna adalah admin.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah login sebagai admin
        if (Auth::guard('admin')->check()) {
            // Jika pengguna adalah admin, lanjutkan permintaan ke aplikasi
            return $next($request);
        }

        // Jika pengguna bukan admin, redirect ke halaman login
        // dan menampilkan pesan bahwa pengguna harus login sebagai admin untuk mengakses halaman tersebut
        return redirect()->route('login')
            ->with([
                'message' => 'Silahkan login sebagai admin untuk mengakses halaman ini', // Pesan error jika bukan admin
                'alert-type' => 'error' // Jenis alert error untuk menunjukkan masalah
            ]);
    }
}
