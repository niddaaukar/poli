<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

class AdminProfileController extends Controller
{
    // Method untuk menampilkan halaman profil admin
    public function index()
    {
        // Mengambil data profil admin yang sedang login
        $admin = Auth::user();  // Menggunakan Auth untuk mendapatkan data user yang sedang login
        
        // Mengembalikan view untuk profil admin dan mengirim data profil admin
        return view('admin.profil.index', compact('admin'));
    }

    // Method untuk mengupdate profil admin
    public function update(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',    // Nama harus diisi dan maksimal 255 karakter
            'no_hp' => 'required|string|max:15',     // Nomor HP harus diisi dan maksimal 15 karakter
            'alamat' => 'required|string|max:255',   // Alamat harus diisi dan maksimal 255 karakter
        ]);

        // Mendapatkan data admin yang sedang login
        $admin = Auth::user();

        // Mengupdate data admin berdasarkan input dari form
        $admin->update([
            'nama' => $request->nama,      // Mengupdate nama admin
            'no_hp' => $request->no_hp,    // Mengupdate nomor HP admin
            'alamat' => $request->alamat,  // Mengupdate alamat admin
        ]);

        // Mengarahkan kembali ke halaman profil dengan pesan sukses
        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui!');
    }

    // Method untuk mengupdate password admin
    public function updatePassword(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'current_password' => 'required|string',             // Password saat ini harus diisi
            'new_password' => 'required|string|min:8|confirmed',  // Password baru harus diisi, minimal 8 karakter, dan konfirmasi password baru
        ]);

        // Mendapatkan data admin yang sedang login
        $admin = Auth::user();

        // Memeriksa apakah password yang dimasukkan cocok dengan password saat ini
        if (!Hash::check($request->current_password, $admin->password)) {
            // Jika password saat ini tidak cocok, kembalikan dengan error
            return redirect()->route('admin.profil')->withErrors(['current_password' => 'Password saat ini salah']);
        }

        // Memperbarui password admin jika password saat ini benar
        $admin->update([
            'password' => Hash::make($request->new_password),  // Mengupdate password dengan password baru yang sudah di-hash
        ]);

        // Mengarahkan kembali ke halaman profil dengan pesan sukses
        return redirect()->route('admin.profil')->with('success', 'Password berhasil diperbarui!');
    }
}
