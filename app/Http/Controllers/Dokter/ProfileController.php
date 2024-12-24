<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Poli;

class ProfileController extends Controller
{
    // Menampilkan halaman profil dokter dengan informasi profil dan daftar poli
    public function index()
    {
        // Mengambil data pengguna yang sedang terautentikasi (dokter)
        $dokter = Auth::user();

        // Mengambil semua data poli dari database
        $polis = Poli::all();

        // Mengembalikan tampilan profil dokter dengan data yang sudah diambil
        return view('dokter.profil.index', compact('dokter', 'polis'));
    }

    // Mengedit data profil dokter
    public function edit(Request $request)
    {
        // Mengambil data pengguna yang sedang terautentikasi (dokter)
        $dokter = Auth::user();

        // Melakukan validasi input dari request yang diterima
        $request->validate([
            'nama' => 'required|string|max:255', // Nama harus diisi dan bertipe string dengan panjang maksimal 255 karakter
            'no_hp' => 'required|numeric|digits_between:10,15|unique:admin,no_hp,' . $dokter->id, // Validasi nomor HP: harus numeric, panjang antara 10 hingga 15 digit, dan unik kecuali untuk dokter yang sedang terautentikasi
            'alamat' => 'required|string', // Alamat harus diisi dan bertipe string
            'id_poli' => 'required|exists:poli,id', // id_poli harus ada dalam tabel poli
        ]);

        // Mengupdate data dokter yang sedang terautentikasi
        $dokter->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'id_poli' => $request->id_poli
        ]);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('dokter.profil.index')
            ->with([
                'message' => 'Profil berhasil diubah!', // Pesan sukses setelah berhasil update
                'alert-type' => 'success', // Jenis pesan yang ditampilkan (success)
            ]);
    }

    // Mengedit password dokter
    public function editPassword(Request $request)
    {
        // Mengambil data pengguna yang sedang terautentikasi (dokter)
        $dokter = Auth::user();

        // Periksa apakah password saat ini cocok dengan password yang tersimpan
        if (!Hash::check($request->current_password, $dokter->password)) {
            // Jika password saat ini tidak cocok, tampilkan error
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }
        
        // Melakukan validasi input dari request untuk password baru
        $request->validate([
            'current_password' => 'required|string', // Password saat ini harus diisi dan bertipe string
            'new_password' => 'required|string|min:8', // Password baru harus diisi, bertipe string, dan memiliki panjang minimal 8 karakter
        ]);

        // Mengupdate password dokter dengan password baru yang sudah di-hash
        $dokter->update([
            'password' => Hash::make($request->new_password), // Menggunakan Hash::make untuk meng-enkripsi password baru
        ]);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('dokter.profil.index')
            ->with([
                'message' => 'Password berhasil diubah!', // Pesan sukses setelah berhasil update password
                'alert-type' => 'success', // Jenis pesan yang ditampilkan (success)
            ]);
    }
}
