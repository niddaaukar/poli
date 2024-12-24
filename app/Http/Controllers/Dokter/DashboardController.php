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
    public function index()
    {
        $dokter = auth()->guard('dokter')->user(); // Mendapatkan dokter yang sedang login
        $jumlah_dokter = Dokter::count();
        $jumlah_poli = Poli::count();
        $jumlah_obat = Obat::count();

        // Mendapatkan jadwal dokter yang sedang login
        $jadwalId = $dokter->jadwalPeriksa->pluck('id');

        // Menghitung jumlah pasien yang terdaftar berdasarkan jadwal dokter
        $jumlah_pasien = DaftarPoli::whereIn('id_jadwal', $jadwalId)
            ->with('periksa')
            ->count();

        // Mendapatkan 5 pasien terbaru berdasarkan jadwal dokter
        $pasiens = DaftarPoli::whereIn('id_jadwal', $jadwalId)
            ->with('pasien') // Pastikan relasi 'pasien' ada di model DaftarPoli
            ->latest('created_at') // Urutkan berdasarkan waktu terbaru
            ->take(5)
            ->get();

        return view('dokter.dashboard.index', compact(
            'jumlah_dokter',
            'jumlah_pasien',
            'jumlah_poli',
            'jumlah_obat',
            'pasiens'
        ));
    }
}
