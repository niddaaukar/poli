<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    //
    public function index()
    {
        $dokter = Auth::guard('dokter')->user();
        
        // Ambil semua jadwal periksa dokter
        $jadwal_periksa = JadwalPeriksa::where('id_dokter', $dokter->id)->get();

        return view('dokter.jadwal_periksa.index', compact('jadwal_periksa'));
    }
    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $dokter = Auth::guard('dokter')->user();

        // Cek apakah waktu bertabrakan
        $existingSchedule = JadwalPeriksa::where('id_dokter', $dokter->id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('jam_mulai', '<=', $request->jam_mulai)
                            ->where('jam_selesai', '>=', $request->jam_selesai);
                    });
            })->exists();

        if ($existingSchedule) {
            return redirect()->back()->with([
                'message' => 'Jadwal Periksa bertabrakan dengan jadwal yang sudah ada!',
                'alert-type' => 'error'
            ]);
        }

        // Nonaktifkan jadwal lain
        JadwalPeriksa::where('id_dokter', $dokter->id)->update(['is_active' => false]);

        // Simpan jadwal baru
        JadwalPeriksa::create([
            'id_dokter' => $dokter->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'is_active' => true,
        ]);

        return redirect()->route('dokter.jadwal_periksa.index')
            ->with([
                'message' => 'Jadwal Periksa berhasil ditambahkan!',
                'alert-type' => 'success'
            ]);
    }


    public function deactivate($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $currentDay = Carbon::now()->translatedFormat('l');
        if ($jadwal->hari === $currentDay) {
            return redirect()->route('dokter.jadwal_periksa.index')
                ->with([
                    'message' => 'Anda tidak dapat menonaktifkan jadwal Periksa hari ini.',
                    'alert-type' => 'error'
                ]);
        }

        if (!$jadwal->is_active) {
            return redirect()->route('dokter.jadwal_periksa.index')
                ->with([
                    'message' => 'Jadwal Periksa sudah dinonaktifkan sebelumnya.',
                    'alert-type' => 'warning'
                ]);
        }

        // Nonaktifkan jadwal
        $jadwal->update(['is_active' => false]);

        return redirect()->route('dokter.jadwal_periksa.index')
            ->with([
                'message' => 'Jadwal Periksa berhasil dinonaktifkan!',
                'alert-type' => 'success'
            ]);
    }

    public function activate($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);

        // Nonaktifkan jadwal lain
        JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)->update(['is_active' => false]);

        if ($jadwal->is_active) {
            return redirect()->route('dokter.jadwal_periksa.index')
                ->with([
                    'message' => 'Jadwal Periksa sudah diaktifkan sebelumnya.',
                    'alert-type' => 'warning'
                ]);
        }

        // Aktifkan jadwal
        $jadwal->update(['is_active' => true]);

        return redirect()->route('dokter.jadwal_periksa.index')
            ->with([
                'message' => 'Jadwal Periksa berhasil diaktifkan!',
                'alert-type' => 'success'
            ]);
    }
}