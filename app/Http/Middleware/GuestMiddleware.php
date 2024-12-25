<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    /**
     * Menangani permintaan yang masuk untuk memverifikasi apakah pengguna sudah login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek jika pengguna sudah login sebagai admin
        if (Auth::guard('admin')->check()) {
            // Jika sudah login sebagai admin, arahkan ke dashboard admin
            return redirect()->route('admin.dashboard')
                ->with([
                    'message' => 'Berhasil login sebagai admin', // Pesan sukses login sebagai admin
                    'alert-type' => 'error' // Jenis alert error jika mencoba akses halaman guest setelah login
                ]);
        } 
        // Cek jika pengguna sudah login sebagai dokter
        elseif (Auth::guard('dokter')->check()) {
            // Jika sudah login sebagai dokter, arahkan ke dashboard dokter
            return redirect()->route('dokter.dashboard')
                ->with([
                    'message' => 'Berhasil login sebagai dokter', // Pesan sukses login sebagai dokter
                    'alert-type' => 'error' // Jenis alert error jika mencoba akses halaman guest setelah login
                ]);
        } 
        // Cek jika pengguna sudah login sebagai pasien
        elseif (Auth::guard('pasien')->check()) {
            // Jika sudah login sebagai pasien, arahkan ke halaman utama pasien
            return redirect()->route('homepage')
                ->with([
                    'message' => 'Berhasil login sebagai pasien', // Pesan sukses login sebagai pasien
                    'alert-type' => 'error' // Jenis alert error jika mencoba akses halaman guest setelah login
                ]);
        }

       
        return $next($request);
    }
}
