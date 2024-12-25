<?php

namespace App\Http\Controllers\Admin;

use App\Models\Obat;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_dokter = Dokter::count();
        $jumlah_pasien = Pasien::count();
        $jumlah_poli = Poli::count();
        $jumlah_obat = Obat::count();

        // Mengambil 5 pasien terbaru berdasarkan waktu pembuatan (created_at) secara descending
        $pasiens = Pasien::orderBy('created_at', 'desc')->take(5)->get();

        // Mengembalikan data ke view
        return view('admin.dashboard.index', compact(
            'jumlah_dokter',
            'jumlah_pasien',
            'jumlah_poli',
            'jumlah_obat',
            'pasiens'
        ));
    }
}
