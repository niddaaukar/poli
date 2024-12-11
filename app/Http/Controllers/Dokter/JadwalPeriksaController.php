<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwalPeriksa = JadwalPeriksa::with('dokter')->paginate(10);
        return view('dokter.jadwal_periksa.index', compact('jadwalPeriksa'));
    }

    public function create()
    {
        $dokters = Dokter::all();
        return view('dokter.jadwal_periksa.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_dokter' => 'required|exists:dokters,id',
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        JadwalPeriksa::create($validated);

        return redirect()->route('dokter.jadwal_periksa.index')->with('success', 'Jadwal periksa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $dokters = Dokter::all();
        return view('dokter.jadwal_periksa.edit', compact('jadwal', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_dokter' => 'required|exists:dokters,id',
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('dokter.jadwal_periksa.index')->with('success', 'Jadwal periksa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('dokter.jadwal_periksa.index')->with('success', 'Jadwal periksa berhasil dihapus.');
    }
}
