<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    public function index()
    {
        $periksas = Periksa::with('daftarPoli.pasien')->paginate(10);
        return view('dokter.periksa.index', compact('periksas'));
    }

    public function create()
    {
        $daftarPolis = DaftarPoli::all();
        return view('dokter.periksa.create', compact('daftarPolis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_daftar_poli' => 'required|exists:daftar_polis,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'nullable|string',
            'biaya_periksa' => 'required|numeric',
        ]);

        Periksa::create($validated);

        return redirect()->route('dokter.periksa.index')->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        $daftarPolis = DaftarPoli::all();
        return view('dokter.periksa.edit', compact('periksa', 'daftarPolis'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_daftar_poli' => 'required|exists:daftar_polis,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'nullable|string',
            'biaya_periksa' => 'required|numeric',
        ]);

        $periksa = Periksa::findOrFail($id);
        $periksa->update($validated);

        return redirect()->route('dokter.periksa.index')->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $periksa = Periksa::findOrFail($id);
        $periksa->delete();

        return redirect()->route('dokter.periksa.index')->with('success', 'Data pemeriksaan berhasil dihapus.');
    }
}
