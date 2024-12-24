<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Method ini digunakan untuk menampilkan seluruh data 'Obat' (medikasi) dari database.
    public function index()
    {
        // Mengambil semua data Obat
        $obats = Obat::all();
        // Mengembalikan tampilan halaman index dan mengirimkan data 'obats' yang telah diambil
        return view('admin.obat.index', compact('obats'));
    }

    // Method ini digunakan untuk menampilkan form pembuatan data 'Obat' baru.
    public function create()
    {
        // Mengembalikan tampilan form untuk membuat 'Obat' baru
        return view('admin.obat.create');
    }

    // Method ini digunakan untuk menampilkan form edit data 'Obat' berdasarkan ID yang diberikan.
    public function edit($id)
    {
        // Mengambil data 'Obat' berdasarkan ID
        $obat = Obat::find($id);
        // Mengembalikan tampilan form edit untuk 'Obat' yang telah diambil, dan mengirimkan data 'obat'
        return view('admin.obat.edit', compact('obat'));
    }

    // Method ini digunakan untuk menyimpan data 'Obat' baru ke dalam database.
    public function store(Request $request)
    {
        // Melakukan validasi terhadap data yang diterima dari request
        $request->validate([
            'nama_obat' => 'required|string|max:50', // Nama obat harus diisi, berupa string, maksimal 50 karakter
            'kemasan' => 'required|string|max:35', // Kemasan harus diisi, berupa string, maksimal 35 karakter
            'harga' => 'required|numeric|regex:/^\d{1,10}$/' // Harga harus berupa angka dengan maksimal 10 digit
        ]);

        // Membuat data 'Obat' baru dengan data yang telah divalidasi
        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        // Mengalihkan kembali ke halaman index 'Obat' dengan pesan sukses
        return redirect()->route('admin.obat.index')
            ->with([
                'message' => 'Obat berhasil ditambahkan!', // Pesan sukses
                'alert-type' => 'success' // Tipe alert untuk notifikasi
            ]);
    }

    // Method ini digunakan untuk memperbarui data 'Obat' yang sudah ada di database.
    public function update(Request $request, $id)
    {
        // Melakukan validasi terhadap data yang diterima dari request (sama seperti di method store)
        $request->validate([
            'nama_obat' => 'required|string|max:50', // Nama obat harus diisi, berupa string, maksimal 50 karakter
            'kemasan' => 'required|string|max:35', // Kemasan harus diisi, berupa string, maksimal 35 karakter
            'harga' => 'required|numeric|regex:/^\d{1,10}$/' // Harga harus berupa angka dengan maksimal 10 digit
        ]);

        // Mengambil data 'Obat' berdasarkan ID
        $obat = Obat::find($id);
        // Memperbarui data 'Obat' yang telah diambil berdasarkan data yang baru
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        // Mengalihkan kembali ke halaman index 'Obat' dengan pesan sukses
        return redirect()->route('admin.obat.index')
            ->with([
                'message' => 'Obat berhasil diperbarui!', // Pesan sukses
                'alert-type' => 'success' // Tipe alert untuk notifikasi
            ]);
    }

    // Method ini digunakan untuk menghapus data 'Obat' dari database.
    public function destroy(Obat $obat)
    {
        // Menghapus data 'Obat' dengan menggunakan soft delete
        $obat->delete();

        // Mengalihkan kembali ke halaman index 'Obat' dengan pesan sukses
        return redirect()->route('admin.obat.index')
            ->with([
                'message' => 'Obat berhasil dihapus!', // Pesan sukses
                'alert-type' => 'success' // Tipe alert untuk notifikasi
            ]);
    }
}
