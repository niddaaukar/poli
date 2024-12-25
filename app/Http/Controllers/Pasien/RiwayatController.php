<?php

namespace App\Http\Controllers\Pasien;

use App\Models\Obat;
use App\Models\Poli;
use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Models\DetailPeriksa;
use App\Models\JadwalPeriksa;
use App\Http\Controllers\Controller;

class RiwayatController extends Controller
{
    // Menampilkan halaman riwayat pemeriksaan pasien
    public function index()
    {
        // Mendapatkan data pasien yang sedang login
        $pasien = auth()->guard('pasien')->user();

        // Mengambil semua data poli
        $polis = Poli::all();

        // Mengambil riwayat pendaftaran poli berdasarkan id pasien
        $riwayats = DaftarPoli::where('id_pasien', $pasien->id)->get();

        // Mengembalikan tampilan halaman riwayat dengan data pasien, poli, dan riwayat
        return view('pasien.riwayat.index', compact('pasien', 'polis', 'riwayats'));
    }

    // Menyimpan data pendaftaran pemeriksaan poli
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'poli' => 'required|exists:polis,id',   // Poli yang dipilih harus ada di tabel poli
            'tanggal' => 'required|date',            // Tanggal pemeriksaan harus berupa tanggal
            'jadwal' => 'required|exists:jadwal_periksa,id', // Jadwal pemeriksaan harus ada
            'keluhan' => 'required|string',          // Keluhan harus diisi dengan string
        ]);

        // Menyimpan data pendaftaran pemeriksaan poli untuk pasien
        DaftarPoli::create([
            'id_pasien' => auth()->guard('pasien')->id(), // ID pasien yang sedang login
            'id_poli' => $request->poli,                   // ID poli yang dipilih
            'tanggal' => $request->tanggal,               // Tanggal pemeriksaan
            'id_jadwal' => $request->jadwal,             // ID jadwal pemeriksaan
            'keluhan' => $request->keluhan,               // Keluhan pasien
            'status' => 'belum_periksa',                  // Status awal pendaftaran adalah 'belum_periksa'
        ]);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Riwayat pemeriksaan berhasil ditambahkan.');
    }

    // Mendapatkan jadwal pemeriksaan berdasarkan poli dan hari
    public function getJadwal($id_poli, $hari)
    {
        // Mengambil jadwal pemeriksaan berdasarkan poli dan hari, serta dokter yang sesuai
        $jadwals = JadwalPeriksa::whereHas('dokter', function ($query) use ($id_poli) {
            $query->where('id_poli', $id_poli);  // Pastikan jadwal terkait dengan poli yang dipilih
        })
            ->where('is_active', 1) // Pastikan jadwal aktif
            ->with('dokter:id,nama') // Mengambil data dokter yang terkait
            ->where('hari', $hari)    // Menyaring jadwal berdasarkan hari
            ->get(['id', 'hari', 'jam_mulai', 'jam_selesai', 'id_dokter']);  // Ambil informasi yang diperlukan

        // Mengembalikan jadwal dalam format JSON
        return response()->json($jadwals);
    }

    // Pendaftaran pemeriksaan poli dengan validasi
    public function daftarPoli(Request $request)
    {
        // Validasi input dari form pendaftaran
        $request->validate([
            'poli' => 'required|exists:poli,id',    // Poli yang dipilih harus ada di tabel poli
            'tgl_periksa' => 'required|date|after:today|before_or_equal:' . now()->addDays(30)->toDateString(), // Tanggal pemeriksaan harus di masa depan, maksimal 30 hari ke depan
            'jadwal' => 'required|exists:jadwal_periksa,id', // Jadwal yang dipilih harus ada
            'keluhan' => 'required|string|max:255',  // Keluhan harus diisi dengan maksimal 255 karakter
        ]);

        // Mendapatkan data pasien yang sedang login
        $pasien = auth()->guard('pasien')->user();

        // Mendapatkan nomor antrian terakhir untuk jadwal dan tanggal periksa yang sama, dan menambahkannya dengan 1
        $noAntrian = DaftarPoli::where('id_jadwal', $request->jadwal)
            ->where('tgl_periksa', $request->tgl_periksa)
            ->max('no_antrian') + 1;

        // Menyimpan data pendaftaran pemeriksaan poli
        DaftarPoli::create([
            'id_pasien' => $pasien->id,   // ID pasien yang sedang login
            'id_jadwal' => $request->jadwal,  // ID jadwal pemeriksaan
            'tgl_periksa' => $request->tgl_periksa,  // Tanggal pemeriksaan
            'keluhan' => $request->keluhan,  // Keluhan pasien
            'no_antrian' => $noAntrian,     // Nomor antrian untuk pasien
        ]);

        // Redirect ke halaman riwayat dengan pesan sukses
        return redirect()->route('pasien.riwayat.index')->with([
            'message' => 'Pendaftaran berhasil!',
            'alert-type' => 'success'
        ]);
    }

    // Menampilkan detail riwayat pemeriksaan pasien
    public function detail($id)
    {
        // Mendapatkan data pasien yang sedang login
        $pasien = auth()->guard('pasien')->user();

        // Mencari data pendaftaran poli berdasarkan ID
        $daftarpoli = DaftarPoli::find($id);
        
        // Mencari data pemeriksaan berdasarkan ID pendaftaran poli
        $periksa = Periksa::where('id_daftar_poli', $id)->first();
        
        // Mengambil semua data obat
        $obats = Obat::all();

        // Jika ada data pemeriksaan, ambil daftar obat yang diberikan pada pemeriksaan tersebut
        $daftarObat = $periksa
            ? DetailPeriksa::where('id_periksa', $periksa->id)->pluck('id_obat')->toArray() // Mengambil daftar obat dari detail pemeriksaan
            : [];

        // Jika data pendaftaran poli tidak ditemukan atau pasien tidak sesuai, kembalikan ke halaman sebelumnya
        if (is_null($daftarpoli) || $daftarpoli->id_pasien != $pasien->id) {
            return redirect()->back()->with([
                'message' => 'Data tidak ditemukan',
                'alert-type' => 'error',
            ]);
        }

        // Menampilkan tampilan detail riwayat pemeriksaan dengan data terkait
        return view('pasien.riwayat.detail', compact('daftarpoli', 'periksa', 'obats', 'daftarObat'));
    }
}
