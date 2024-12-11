<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Pasien;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    public function index()
    {
        $daftarPolis = DaftarPoli::with('pasien', 'jadwalPeriksa.dokter')->paginate(10);
        return view('dokter.daftar_poli.index', compact('daftarPolis'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $jadwals = JadwalPeriksa::with('dokter')->get();
        return view('dokter.daftar_poli.create', compact('pasiens', 'jadwals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pasien' => 'required|exists:pasiens,id',
            'id_jadwal' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'nullable|string',
            'no_antrian' => 'required|numeric',
        ]);

        DaftarPoli::create($validated);

        return redirect()->route('dokter.daftar_poli.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $daftarPoli = DaftarPoli::findOrFail($id);
        $daftarPoli->delete();

        return redirect()->route('dokter.daftar_poli.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
