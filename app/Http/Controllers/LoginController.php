<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Dokter;
use App\Models\Pasien;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function index()
    {
        return view('frontend.auth.login'); // Tampilan form login
    }

    /**
     * Proses login berdasarkan nomor HP dan password.
     */
    public function login(Request $request)
    {
        // Validasi input: nomor HP harus numeric dan panjang 10-15 digit, password minimal 8 karakter
        $request->validate([
            'no_hp' => 'required|numeric|digits_between:10,15',
            'password' => 'required|string|min:8',
        ]);
    
        // Ambil data input dari form
        $no_hp = $request->no_hp;
        $password = $request->password;

        // 1. Cek pada tabel Admin
        $admin = Admin::where('no_hp', $no_hp)->first(); // Cari admin berdasarkan no_hp
        if ($admin && Hash::check($password, $admin->password)) { // Cek password
            Auth::guard('admin')->login($admin); // Login menggunakan guard admin
            return redirect()->route('admin.dashboard') // Arahkan ke dashboard admin
                ->with([
                    'message' => 'Selamat datang di Dashboard Admin!',
                    'alert-type' => 'success'
                ]);
        }

        // 2. Cek pada tabel Dokter
        $dokter = Dokter::where('no_hp', $no_hp)->first(); // Cari dokter berdasarkan no_hp
        if ($dokter && Hash::check($password, $dokter->password)) { // Cek password
            Auth::guard('dokter')->login($dokter); // Login menggunakan guard dokter
            return redirect()->route('dokter.dashboard') // Arahkan ke dashboard dokter
                ->with([
                    'message' => 'Selamat datang di Dashboard Dokter!',
                    'alert-type' => 'success'
                ]);
        }

        // 3. Cek pada tabel Pasien
        $pasien = Pasien::where('no_hp', $no_hp)->first(); // Cari pasien berdasarkan no_hp
        if ($pasien && Hash::check($password, $pasien->password)) { // Cek password
            Auth::guard('pasien')->login($pasien); // Login menggunakan guard pasien
            return redirect()->route('homepage') // Arahkan ke halaman pasien
                ->with([
                    'message' => 'Selamat datang di halaman pasien!',
                    'alert-type' => 'success'
                ]);
        }

        // Jika tidak ditemukan data yang cocok, tampilkan error
        return back()->withErrors([ // Kembalikan ke halaman login dengan pesan error
            'no_hp' => 'Nomor HP atau password salah.',
        ]);
    }

    /**
     * Proses logout untuk semua guard yang digunakan.
     */
    public function logout(Request $request)
    {
        $guards = ['admin', 'dokter', 'pasien']; // Daftar guard yang digunakan
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) { // Periksa setiap guard apakah sedang login
                Auth::guard($guard)->logout(); // Logout dari guard yang aktif
            }
        }

        $request->session()->invalidate(); // Hapus session yang ada
        $request->session()->regenerateToken(); // Regenerasi token CSRF untuk mencegah serangan

        // Arahkan pengguna ke halaman homepage setelah logout
        return redirect()->route('homepage')
            ->with([
                'message' => 'Anda telah logout.',
                'alert-type' => 'success'
            ]);
    }

}
