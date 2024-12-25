<?php

namespace App\Http\Controllers\Dokter;

// Import semua model yang digunakan di controller Daftar Poli
use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Pasien;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    // Menampilkan daftar pendaftaran poli
    public function index()
    {
        // Mengambil data DaftarPoli dengan relasi ke pasien dan dokter di jadwal periksa, lalu paginasi 10 data per halaman
        $daftarPolis = DaftarPoli::with('pasien', 'jadwalPeriksa.dokter')->paginate(10);
        // Mengarahkan ke view 'dokter.daftar_poli.index' dengan data daftar poli
        return view('dokter.daftar_poli.index', compact('daftarPolis'));
    }

    // Menampilkan form untuk menambahkan data pendaftaran poli baru
    public function create()
    {
        // Mengambil semua data pasien
        $pasiens = Pasien::all();
        // Mengambil semua jadwal periksa beserta data dokter yang terkait
        $jadwals = JadwalPeriksa::with('dokter')->get();
        // Mengarahkan ke view 'dokter.daftar_poli.create' dengan data pasien dan jadwal
        return view('dokter.daftar_poli.create', compact('pasiens', 'jadwals'));
    }

    // Menyimpan data pendaftaran poli baru ke database
    public function store(Request $request)
    {
        // Memvalidasi input yang diterima dari request
        $validated = $request->validate([
            'id_pasien' => 'required|exists:pasiens,id', // id_pasien harus ada di tabel pasiens
            'id_jadwal' => 'required|exists:jadwal_periksas,id', // id_jadwal harus ada di tabel jadwal_periksas
            'keluhan' => 'nullable|string', // keluhan boleh kosong, jika diisi harus berupa string
            'no_antrian' => 'required|numeric', // no_antrian wajib diisi dan harus berupa angka
        ]);

        // Membuat data baru di tabel DaftarPoli berdasarkan input yang sudah divalidasi
        DaftarPoli::create($validated);

        // Mengarahkan kembali ke halaman daftar poli dengan pesan sukses
        return redirect()->route('dokter.daftar_poli.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    // Menghapus data pendaftaran poli berdasarkan ID
    public function destroy($id)
    {
        // Mencari data DaftarPoli berdasarkan ID, jika tidak ditemukan akan menampilkan error 404
        $daftarPoli = DaftarPoli::findOrFail($id);
        // Menghapus data yang ditemukan
        $daftarPoli->delete();

        // Mengarahkan kembali ke halaman daftar poli dengan pesan sukses
        return redirect()->route('dokter.daftar_poli.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
