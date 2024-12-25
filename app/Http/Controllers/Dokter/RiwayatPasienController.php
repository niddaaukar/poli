<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dokter\RiwayatPasienController;

class RiwayatPasienController extends Controller
{
    // Menampilkan riwayat pasien berdasarkan dokter yang sedang login
    public function index()
    {
        // Mendapatkan ID dokter yang sedang login
        $idDokter = auth()->guard('dokter')->user()->id;

        // Mengambil data pasien yang telah terdaftar untuk jadwal periksa dokter ini
        $pasiens = DaftarPoli::with(['pasien', 'jadwalPeriksa.dokter'])
            // Menggunakan relasi untuk memastikan hanya pasien dengan jadwal periksa yang sesuai dokter yang ditampilkan
            ->whereHas('jadwalPeriksa', function ($query) use ($idDokter) {
                $query->where('id_dokter', $idDokter);
            })
            // Mengurutkan berdasarkan tanggal periksa terbaru
            ->orderBy('tgl_periksa', 'desc')
            ->get()
            // Memastikan bahwa pasien yang ditampilkan unik berdasarkan id_pasien
            ->unique('id_pasien');

        // Menampilkan halaman riwayat pasien
        return view('dokter.riwayat_pasien.index', compact('pasiens'));
    }

    // Menampilkan detail riwayat pemeriksaan pasien berdasarkan ID pasien
    public function show($id)
    {
        // Mengambil riwayat periksa pasien berdasarkan ID pasien yang diberikan
        $pasien = DaftarPoli::with(['pasien', 'jadwalPeriksa.dokter.poli', 'periksa.detailPeriksa.obat'])
            // Menyaring data berdasarkan ID pasien
            ->where('id_pasien', $id)
            // Mengurutkan berdasarkan tanggal periksa terbaru
            ->orderBy('tgl_periksa', 'desc')
            ->get();

        // Menampilkan halaman detail riwayat pasien
        return view('dokter.riwayat_pasien.detail', compact('pasien'));
    }
}
