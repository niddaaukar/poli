<?php

namespace App\Http\Controllers\Dokter;


use App\Http\Controllers\Controller;
use App\Models\DetailPeriksa;
use App\Models\Periksa;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailPeriksaController extends Controller
{
    // Menampilkan detail periksa untuk setiap pemeriksaan berdasarkan ID pemeriksaan
    public function index($periksaId)
    {
        // Mengambil detail periksa berdasarkan ID pemeriksaan dan memuat relasi 'obat', lalu melakukan paginasi 10 data per halaman
        $details = DetailPeriksa::with('obat')->where('id_periksa', $periksaId)->paginate(10);

        // Mengarahkan ke view 'dokter.detail_periksa.index' dan mengirimkan data detail periksa dan ID pemeriksaan
        return view('dokter.detail_periksa.index', compact('details', 'periksaId'));
    }

    // Menampilkan form untuk menambahkan detail periksa baru berdasarkan ID pemeriksaan
    public function create($periksaId)
    {
        // Mengambil semua data obat yang tersedia
        $obats = Obat::all();

        // Mengarahkan ke view 'dokter.detail_periksa.create' dan mengirimkan data obat serta ID pemeriksaan
        return view('dokter.detail_periksa.create', compact('obats', 'periksaId'));
    }

    // Menyimpan data detail periksa baru ke database
    public function store(Request $request, $periksaId)
    {
        // Memvalidasi input dari form
        $validated = $request->validate([
            'id_obat' => 'required|exists:obats,id', // Memastikan ID obat yang dipilih ada di tabel obats
        ]);

        // Membuat data baru di tabel DetailPeriksa dengan ID pemeriksaan dan ID obat
        DetailPeriksa::create([
            'id_periksa' => $periksaId,
            'id_obat' => $validated['id_obat'],
        ]);

        // Mengarahkan kembali ke halaman daftar detail periksa dengan ID pemeriksaan, dan menampilkan pesan sukses
        return redirect()->route('dokter.detail_periksa.index', $periksaId)->with('success', 'Obat berhasil ditambahkan.');
    }

    // Menghapus detail periksa berdasarkan ID pemeriksaan dan ID detail periksa
    public function destroy($periksaId, $id)
    {
        // Mencari detail periksa berdasarkan ID yang diberikan, jika tidak ditemukan akan menampilkan error 404
        $detail = DetailPeriksa::findOrFail($id);

        // Menghapus detail periksa yang ditemukan
        $detail->delete();

        // Mengarahkan kembali ke halaman daftar detail periksa dengan ID pemeriksaan, dan menampilkan pesan sukses
        return redirect()->route('dokter.detail_periksa.index', $periksaId)->with('success', 'Obat berhasil dihapus.');
    }
}
