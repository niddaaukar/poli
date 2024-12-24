<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    // Menampilkan daftar semua dokter
    public function index()
    {
        // Mengambil semua data dokter dari database
        $dokters = Dokter::all();

        // Mengembalikan tampilan dengan data dokter yang telah diambil
        return view('admin.dokter.index', compact('dokters'));
    }

    // Menampilkan form untuk menambah dokter baru
    public function create()
    {
        // Mengambil semua data poli untuk dipilih saat membuat dokter baru
        $polis = Poli::all();

        // Mengembalikan tampilan form pembuatan dokter dengan data poli
        return view('admin.dokter.create', compact('polis'));
    }

    // Menampilkan form untuk mengedit data dokter yang ada
    public function edit($id)
    {
        // Mencari dokter berdasarkan ID yang diberikan, jika tidak ditemukan akan menghasilkan error 404
        $dokter = Dokter::findOrFail($id);

        // Mengambil semua data poli untuk dipilih saat mengedit data dokter
        $polis = Poli::all();

        // Mengembalikan tampilan form pengeditan dokter dengan data dokter dan poli
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }
    
    // Menyimpan data dokter baru ke database
    public function store(Request $request)
    {
        // dd($request->all());  // Debugging, menampilkan semua data yang diterima
        // Validasi input dari user
        $request->validate([
            'nama' => 'required|string|max:255', // Nama dokter wajib diisi dan maksimal 255 karakter
            'alamat' => 'required|string|max:500', // Alamat dokter wajib diisi dan maksimal 500 karakter
            'no_hp' => 'required|numeric|digits_between:10,15|unique:dokter', // No HP harus numeric, panjang antara 10 hingga 15 digit, dan unik untuk setiap dokter
            'password' => [
                'required',
                'string',
                'min:8', // Minimal panjang password 8 karakter
                'regex:/[a-z]/', // Password harus mengandung setidaknya satu huruf kecil
                'regex:/[A-Z]/', // Password harus mengandung setidaknya satu huruf besar
                'regex:/[0-9]/', // Password harus mengandung setidaknya satu angka
                'regex:/[!@#$%^&*(),.?":{}|<>]/' // Password harus mengandung setidaknya satu simbol
            ],
            'id_poli' => 'required|exists:poli,id', // id_poli harus ada dalam tabel poli
        ], [
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, dan satu simbol!', // Pesan khusus jika password tidak sesuai format
        ]);

        // Menyiapkan data yang akan disimpan
        $createData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ];

        // Jika password diisi, maka password di-hash dan ditambahkan ke data yang akan disimpan
        if ($request->filled('password')) {
            $createData['password'] = Hash::make($request->password); // Menggunakan Hash::make untuk mengenkripsi password
        }

        // Simpan data dokter baru ke dalam database
        Dokter::create($createData);

        // Redirect kembali ke halaman daftar dokter dengan pesan sukses
        return redirect()->route('admin.dokter.index')
            ->with([
                'message' => 'Dokter berhasil ditambahkan!', // Pesan sukses setelah dokter ditambahkan
                'alert-type' => 'success' // Jenis pesan yang ditampilkan (success)
            ]);
    }

    // Memperbarui data dokter yang ada
    public function update(Request $request, Dokter $dokter)
    {
        // Validasi input dari user
        $request->validate([
            'nama' => 'required|string|max:255', // Nama dokter wajib diisi dan maksimal 255 karakter
            'alamat' => 'required|string|max:500', // Alamat dokter wajib diisi dan maksimal 500 karakter
            'no_hp' => 'required|numeric|digits_between:10,15|unique:dokter,no_hp,' . $dokter->id, // Validasi no_hp yang unik kecuali untuk dokter yang sedang diubah
            'password' => 'nullable|string|min:8', // Password opsional, minimal panjang 8 karakter jika diisi
            'id_poli' => 'required|exists:poli,id', // id_poli harus ada dalam tabel poli
        ]);

        // Menyiapkan data yang akan diupdate
        $updateData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ];

        // Jika password diisi, maka password di-hash dan ditambahkan ke data yang akan diupdate
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password); // Menggunakan Hash::make untuk mengenkripsi password
        }

        // Memperbarui data dokter
        $dokter->update($updateData);

        // Redirect kembali ke halaman daftar dokter dengan pesan sukses
        return redirect()->route('admin.dokter.index')
            ->with([
                'message' => 'Dokter berhasil diperbarui!', // Pesan sukses setelah dokter berhasil diperbarui
                'alert-type' => 'success' // Jenis pesan yang ditampilkan (success)
            ]);
    }

    // Menghapus dokter (soft delete)
    public function destroy(Dokter $dokter)
    {
        // Menghapus dokter menggunakan soft delete
        $dokter->delete();

        // Redirect kembali ke halaman daftar dokter dengan pesan sukses
        return redirect()->route('admin.dokter.index')
            ->with([
                'message' => 'Dokter berhasil dihapus!', // Pesan sukses setelah dokter berhasil dihapus
                'alert-type' => 'success' // Jenis pesan yang ditampilkan (success)
            ]);
    }
}
