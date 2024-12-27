<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PasienController extends Controller
{
    // Menampilkan seluruh data pasien dari database.
    public function index()
    {
        // Mengambil semua data Pasien
        $pasiens = Pasien::all();

        // Mengembalikan tampilan halaman index dan mengirimkan data 'pasiens' yang telah diambil
        return view('admin.pasien.index', compact('pasiens'));
    }

    // Menampilkan form pembuatan data pasien baru.
    public function create()
    {
        // Menggenerate Nomor Rekam Medis (No RM) otomatis berdasarkan bulan dan tahun saat ini
        $no_rm = $this->generateNoRM(); 

        // Mengembalikan tampilan form untuk membuat pasien baru dan mengirimkan No RM yang telah digenerate
        return view('admin.pasien.create', compact('no_rm'));
    }

    // Menampilkan form edit data pasien berdasarkan ID yang diberikan.
    public function edit($id)
    {
        // Mencari pasien berdasarkan ID yang diberikan
        $pasien = Pasien::findOrFail($id);

        // Mengembalikan tampilan form edit dan mengirimkan data pasien yang telah diambil
        return view('admin.pasien.edit', compact('pasien'));
    }

    // Menyimpan data pasien baru ke dalam database.
    public function store(Request $request)
    {
        // Melakukan validasi terhadap data yang diterima dari request
        $request->validate([
            'nama' => 'required|string|max:255', // Nama harus diisi dan merupakan string dengan maksimal 255 karakter
            'alamat' => 'required|string|max:255', // Alamat harus diisi dan merupakan string dengan maksimal 255 karakter
            'no_hp' => 'required|numeric|digits_between:10,15|unique:pasien', // Nomor HP harus diisi, berupa angka dengan 10-15 digit dan unik
            'no_ktp' => 'required|numeric|digits:16|unique:pasien', // Nomor KTP harus diisi, berupa angka dengan 16 digit dan unik
            'no_rm' => 'required|string|max:25|unique:pasien', // Nomor RM harus diisi, berupa string dengan maksimal 25 karakter dan unik
            'password' => 'required|string|min:8', // Password harus diisi, berupa string dengan minimal 8 karakter
        ]);

        // Membuat array data untuk disimpan ke database
        $createData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $request->no_rm,
        ];

        // Jika password diisi, hash password dan tambahkan ke data yang akan disimpan
        if ($request->filled('password')) {
            $createData['password'] = Hash::make($request->password); // Menggunakan Hash untuk mengenkripsi password
        }

        // Menyimpan data pasien baru ke database
        Pasien::create($createData);

        // Mengalihkan kembali ke halaman daftar pasien dengan pesan sukses
        return redirect()->route('admin.pasien.index')
            ->with([
                'message' => 'Pasien berhasil ditambahkan!', // Pesan sukses
                'alert-type' => 'success' // Tipe alert untuk notifikasi
            ]);
    }

    // Memperbarui data pasien yang sudah ada di database.
    public function update(Request $request, Pasien $pasien)
    {
        // Melakukan validasi terhadap data yang diterima dari request (sama seperti di method store)
        $request->validate([
            'nama' => 'required|string|max:255', // Nama harus diisi dan merupakan string dengan maksimal 255 karakter
            'alamat' => 'required|string|max:255', // Alamat harus diisi dan merupakan string dengan maksimal 255 karakter
            'no_hp' => 'required|numeric|digits_between:10,15|unique:pasien,no_hp,' . $pasien->id, // Nomor HP harus unik, kecuali untuk data pasien yang sedang diedit
            'no_ktp' => 'required|numeric|digits:16|unique:pasien,no_ktp,' . $pasien->id, // Nomor KTP harus unik, kecuali untuk data pasien yang sedang diedit
            'no_rm' => 'required|string|max:25', // Nomor RM harus diisi dan merupakan string dengan maksimal 25 karakter
            'password' => 'nullable|string|min:8', // Password bersifat opsional, jika diisi maka harus lebih dari 8 karakter
        ]);

        // Membuat array data untuk diperbarui
        $updateData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $request->no_rm,
        ];

        // Jika password diisi, hash password dan tambahkan ke data yang akan diperbarui
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password); // Menggunakan Hash untuk mengenkripsi password
        }

        // Memperbarui data pasien yang ada dengan data yang baru
        $pasien->update($updateData);

        // Mengalihkan kembali ke halaman daftar pasien dengan pesan sukses
        return redirect()->route('admin.pasien.index')
            ->with([
                'message' => 'Pasien berhasil diperbarui!', // Pesan sukses
                'alert-type' => 'success' // Tipe alert untuk notifikasi
            ]);
    }

    // Menghapus data pasien dari database.
    public function destroy(Pasien $pasien)
    {
        // Menghapus data pasien dari database
        $pasien->delete();

        // Mengalihkan kembali ke halaman daftar pasien dengan pesan sukses
        return redirect()->route('admin.pasien.index')
            ->with([
                'message' => 'Pasien berhasil dihapus!', // Pesan sukses
                'alert-type' => 'success' // Tipe alert untuk notifikasi
            ]);
    }

    // Menghasilkan Nomor Rekam Medis (No RM) secara otomatis berdasarkan tahun, bulan, dan urutan pasien.
    public function generateNoRM()
    {
        // Ambil tahun dan bulan sekarang
        $tahun = Carbon::now()->year; 
        $bulan = Carbon::now()->month; 

        // Ambil jumlah pasien yang terdaftar pada bulan dan tahun ini
        $jumlah_pasien = Pasien::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->count();

        // Urutan pasien selanjutnya
        $urutan = $jumlah_pasien + 1;

        // Format No RM: Tahun + Bulan + Urutan
        $no_rm = $tahun . str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-' . $urutan;

        // Mengembalikan No RM yang telah diformat
        return $no_rm;
    }
}
