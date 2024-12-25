<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    // Menampilkan semua jadwal periksa dokter yang sedang login
    public function index()
    {
        // Mendapatkan data dokter yang sedang login melalui guard 'dokter'
        $dokter = Auth::guard('dokter')->user(); 
        
        // Mengambil semua jadwal periksa yang dimiliki oleh dokter tersebut
        $jadwal_periksa = JadwalPeriksa::where('id_dokter', $dokter->id)->get();

        // Menampilkan tampilan halaman jadwal periksa dengan data jadwal yang sudah diambil
        return view('dokter.jadwal_periksa.index', compact('jadwal_periksa'));
    }

    // Menyimpan jadwal periksa baru
    public function store(Request $request)
    {
        // Validasi input dari form untuk memastikan data yang dimasukkan sesuai
        $request->validate([
            'hari' => 'required|string', // Hari wajib diisi dan berupa string
            'jam_mulai' => 'required|date_format:H:i', // Jam mulai harus sesuai format waktu (HH:mm)
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai', // Jam selesai harus lebih besar dari jam mulai
        ]);

        // Mendapatkan informasi dokter yang sedang login
        $dokter = Auth::guard('dokter')->user();

        // Mengecek apakah ada jadwal yang bertabrakan dengan jadwal yang akan dibuat
        $existingSchedule = JadwalPeriksa::where('id_dokter', $dokter->id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                // Mengecek apakah ada waktu yang tumpang tindih dengan jadwal yang baru
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('jam_mulai', '<=', $request->jam_mulai)
                            ->where('jam_selesai', '>=', $request->jam_selesai);
                    });
            })->exists();

        // Jika jadwal sudah ada yang bertabrakan, beri notifikasi error
        if ($existingSchedule) {
            return redirect()->back()->with([
                'message' => 'Jadwal Periksa bertabrakan dengan jadwal yang sudah ada!',
                'alert-type' => 'error'
            ]);
        }

        // Nonaktifkan jadwal lain yang aktif sebelumnya (hanya satu jadwal yang aktif per dokter)
        JadwalPeriksa::where('id_dokter', $dokter->id)->update(['is_active' => false]);

        // Simpan jadwal baru dengan status aktif
        JadwalPeriksa::create([
            'id_dokter' => $dokter->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'is_active' => true, // Menandakan bahwa jadwal ini aktif
        ]);

        // Redirect ke halaman jadwal periksa dengan pesan sukses
        return redirect()->route('dokter.jadwal_periksa.index')
            ->with([
                'message' => 'Jadwal Periksa berhasil ditambahkan!',
                'alert-type' => 'success'
            ]);
    }

    // Menonaktifkan jadwal periksa tertentu berdasarkan ID
    public function deactivate($id)
    {
        // Mencari jadwal periksa berdasarkan ID
        $jadwal = JadwalPeriksa::findOrFail($id);

        // Mendapatkan nama hari saat ini menggunakan Carbon
        $currentDay = Carbon::now()->translatedFormat('l');

        // Mengecek apakah jadwal yang akan dinonaktifkan adalah hari ini
        if ($jadwal->hari === $currentDay) {
            return redirect()->route('dokter.jadwal_periksa.index')
                ->with([
                    'message' => 'Anda tidak dapat menonaktifkan jadwal Periksa hari ini.',
                    'alert-type' => 'error'
                ]);
        }

        // Mengecek apakah jadwal sudah dinonaktifkan sebelumnya
        if (!$jadwal->is_active) {
            return redirect()->route('dokter.jadwal_periksa.index')
                ->with([
                    'message' => 'Jadwal Periksa sudah dinonaktifkan sebelumnya.',
                    'alert-type' => 'warning'
                ]);
        }

        // Nonaktifkan jadwal periksa tersebut
        $jadwal->update(['is_active' => false]);

        // Redirect ke halaman jadwal periksa dengan pesan sukses
        return redirect()->route('dokter.jadwal_periksa.index')
            ->with([
                'message' => 'Jadwal Periksa berhasil dinonaktifkan!',
                'alert-type' => 'success'
            ]);
    }

    // Mengaktifkan jadwal periksa berdasarkan ID
    public function activate($id)
    {
        // Mencari jadwal periksa berdasarkan ID
        $jadwal = JadwalPeriksa::findOrFail($id);

        // Nonaktifkan jadwal lain yang aktif terlebih dahulu
        JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)->update(['is_active' => false]);

        // Jika jadwal sudah aktif sebelumnya, beri pesan peringatan
        if ($jadwal->is_active) {
            return redirect()->route('dokter.jadwal_periksa.index')
                ->with([
                    'message' => 'Jadwal Periksa sudah diaktifkan sebelumnya.',
                    'alert-type' => 'warning'
                ]);
        }

        // Mengaktifkan jadwal yang dipilih
        $jadwal->update(['is_active' => true]);

        // Redirect ke halaman jadwal periksa dengan pesan sukses
        return redirect()->route('dokter.jadwal_periksa.index')
            ->with([
                'message' => 'Jadwal Periksa berhasil diaktifkan!',
                'alert-type' => 'success'
            ]);
    }
}
