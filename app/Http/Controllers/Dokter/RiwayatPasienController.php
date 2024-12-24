<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dokter\RiwayatPasienController;

class RiwayatPasienController extends Controller
{
    
    public function index()
    {
        $idDokter = auth()->guard('dokter')->user()->id;

        $pasiens = DaftarPoli::with(['pasien', 'jadwalPeriksa.dokter'])
            ->whereHas('jadwalPeriksa', function ($query) use ($idDokter) {
                $query->where('id_dokter', $idDokter);
            })
            ->orderBy('tgl_periksa', 'desc')
            ->get()
            ->unique('id_pasien');
        return view('dokter.riwayat_pasien.index', compact('pasiens'));
    }
    public function show($id)
    {

    $pasien = DaftarPoli::with(['pasien', 'jadwalPeriksa.dokter.poli', 'periksa.detailPeriksa.obat'])
        ->where('id_pasien', $id)
        ->orderBy('tgl_periksa', 'desc')
        ->get();

    return view('dokter.riwayat_pasien.detail', compact('pasien'));
    }

}
