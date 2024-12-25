<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Obat;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Menampilkan data statistik untuk dashboard dokter
    public function index()
    {
        // Mendapatkan data dokter yang sedang login menggunakan guard 'dokter'
        $dokter = auth()->guard('dokter')->user();

        // Menghitung jumlah dokter yang terdaftar di database
        $jumlah_dokter = Dokter::count();

        // Menghitung jumlah poli yang terdaftar di database
        $jumlah_poli = Poli::count();

        // Menghitung jumlah obat yang terdaftar di database
        $jumlah_obat = Obat::count();

        // Mendapatkan ID jadwal periksa yang terkait dengan dokter yang sedang login
        $jadwalId = $dokter->jadwalPeriksa->pluck('id');

        // Menghitung jumlah pasien yang terdaftar berdasarkan jadwal dokter yang sedang login
        $jumlah_pasien = DaftarPoli::whereIn('id_jadwal', $jadwalId)
            ->with('periksa') // Memuat relasi 'periksa' untuk mengecek status pemeriksaan
            ->count();

        // Mendapatkan 5 pasien terbaru yang terdaftar berdasarkan jadwal dokter yang sedang login
        $pasiens = DaftarPoli::whereIn('id_jadwal', $jadwalId)
            ->with('pasien') // Relasi 'pasien' untuk mengambil data pasien yang terdaftar
            ->latest('created_at') // Mengurutkan pasien berdasarkan waktu pendaftaran terbaru
            ->take(5) // Membatasi hanya 5 pasien terbaru
            ->get();

        // Mengarahkan ke view 'dokter.dashboard.index' dan mengirimkan data statistik ke view
        return view('dokter.dashboard.index', compact(
            'jumlah_dokter', // Jumlah dokter yang terdaftar
            'jumlah_pasien', // Jumlah pasien yang terdaftar untuk jadwal dokter
            'jumlah_poli', // Jumlah poli yang terdaftar
            'jumlah_obat', // Jumlah obat yang terdaftar
            'pasiens' // Data 5 pasien terbaru
        ));
    }
}
