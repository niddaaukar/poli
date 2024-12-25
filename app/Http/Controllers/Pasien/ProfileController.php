<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil data pasien yang sedang login
        $pasien = auth()->guard('pasien')->user();

        // Menampilkan halaman profil dengan data pasien yang telah diambil
        return view('pasien.profil.index', compact('pasien'));
    }

    // Mengupdate profil pasien
    public function updateProfile(Request $request)
    {
        // Validasi input yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15|unique:pasien,no_hp,' . auth()->guard('pasien')->user()->id,
            'no_ktp' => 'required|numeric|digits:16|unique:pasien,no_ktp,' . auth()->guard('pasien')->user()->id,
            'no_rm' => 'required|string|max:25',
        ]);

        // Mencari data pasien berdasarkan ID pasien yang sedang login
        $pasien = Pasien::find(auth()->guard('pasien')->user()->id);

        // Memperbarui data pasien sesuai dengan input yang diterima
        $pasien->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'no_ktp' => $request->input('no_ktp'),
            'no_rm' => $request->input('no_rm'),
        ]);

        // Mengarahkan kembali ke halaman profil dengan pesan sukses
        return redirect()->route('pasien.profil.index')->with([
            'message' => 'Profil berhasil diubah!',
            'alert-type' => 'success'
        ]);
    }

    // Mengupdate password pasien
    public function updatePassword(Request $request)
    {
        // Mencari data pasien berdasarkan ID pasien yang sedang login
        $pasien = Pasien::find(auth()->guard('pasien')->user()->id);

        // Validasi input password
        $request->validate([
            'password_sekarang' => 'required|string|min:8',
            'password_baru' => 'required|string|min:8', // Password baru harus sesuai dengan konfirmasi
            'konfirmasi_password' => 'required|string|min:8|same:password_baru', // Konfirmasi password harus sama dengan password baru
        ]);

        // Memastikan password lama benar
        if (!Hash::check($request->password_sekarang, $pasien->password)) {
            return redirect()->back()->withErrors(['password_sekarang' => 'Password lama salah'])->withInput();
        }

        // Mengupdate password pasien
        $pasien->update([
            'password' => Hash::make($request->password_baru),
        ]);

        // Mengarahkan kembali ke halaman profil dengan pesan sukses
        return redirect()->back()->with([
            'message' => 'Password berhasil diubah!',
            'alert-type' => 'success'
        ]);
    }
}
