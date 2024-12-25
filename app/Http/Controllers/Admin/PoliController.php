<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poli;

class PoliController extends Controller
{
    // Menampilkan daftar semua Poli
    public function index()
    {
        // Mengambil semua data Poli dari database
        $polis = Poli::all();

        // Mengembalikan view dengan data Poli yang ada
        return view('admin.poli.index', compact('polis'));
    }

    // Menampilkan form tambah Poli
    public function create()
    {
        // Menampilkan view untuk form tambah Poli
        return view('admin.poli.create');
    }

    // Menampilkan form edit Poli berdasarkan ID
    public function edit($id)
    {
        // Mencari Poli berdasarkan ID yang diberikan
        $poli = Poli::findOrFail($id);

        // Menampilkan form edit dengan data Poli yang sudah ada
        return view('admin.poli.edit', compact('poli'));
    }

    // Menyimpan data Poli baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_poli' => 'required|string|max:255', // Nama poli harus diisi dan maksimal 255 karakter
            'keterangan' => 'required|string', // Keterangan poli harus diisi
        ]);

        // Membuat Poli baru dengan data yang diterima dari request
        Poli::create([
            'nama_poli' => $request->nama_poli, // Nama poli
            'keterangan' => $request->keterangan // Keterangan poli
        ]);

        // Mengarahkan kembali ke halaman index poli dengan pesan sukses
        return redirect()->route('admin.poli.index')
            ->with([
                'message' => 'Poli berhasil ditambahkan!', // Pesan sukses
                'alert-type' => 'success' // Jenis alert
            ]);
    }

    // Memperbarui data Poli yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama_poli' => 'required|string|max:255', // Nama poli harus diisi dan maksimal 255 karakter
            'keterangan' => 'required|string', // Keterangan poli harus diisi
        ]);

        // Mencari Poli berdasarkan ID yang diberikan
        $poli = Poli::findOrFail($id);

        // Memperbarui data Poli dengan data yang diterima dari request
        $poli->update([
            'nama_poli' => $request->nama_poli, // Nama poli
            'keterangan' => $request->keterangan // Keterangan poli
        ]);

        // Mengarahkan kembali ke halaman index poli dengan pesan sukses
        return redirect()->route('admin.poli.index')
            ->with([
                'message' => 'Poli berhasil diubah!', // Pesan sukses
                'alert-type' => 'success' // Jenis alert
            ]);
    }

    // Method untuk menghapus data Poli berdasarkan ID
    public function destroy($id)
    {
        // Mencari Poli berdasarkan ID yang diberikan
        $poli = Poli::findOrFail($id);
        
        // Menghapus Poli yang ditemukan
        $poli->delete();

        // Mengarahkan kembali ke halaman index poli dengan pesan sukses
        return redirect()->route('admin.poli.index')
            ->with([
                'message' => 'Poli berhasil dihapus!', // Pesan sukses
                'alert-type' => 'success' // Jenis alert
            ]);
    }
}
