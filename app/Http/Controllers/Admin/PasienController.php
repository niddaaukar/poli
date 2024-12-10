<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    //
    public function index()
    {
        $pasiens = Pasien::all();

        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);

        return view('admin.pasien.edit', compact('pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15|unique:pasien',
            'no_ktp' => 'required|numeric|digits:16|unique:pasien',
            'no_rm' => 'required|string|max:25',
            'password' => 'required|string|min:8',
        ]);

        $createData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $request->no_rm,
        ];

        // Jika password diisi, hash password dan tambahkan ke data yang akan disimpan
        if ($request->filled('password')) {
            $createData['password'] = Hash::make($request->password); // Hash password
        }

        Pasien::create($createData);

        return redirect()->route('admin.pasien.index')
            ->with([
                'message' => 'Pasien berhasil ditambahkan!',
                'alert-type' => 'success'
            ]);
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15|unique:pasien,no_hp,' . $pasien->id,
            'no_ktp' => 'required|numeric|digits:16|unique:pasien,no_ktp,' . $pasien->id,
            'no_rm' => 'required|string|max:25',
            'password' => 'nullable|string|min:8',
        ]);

        $updateData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $request->no_rm,
        ];

        // Jika password diisi, hash password dan tambahkan ke data yang akan disimpan
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password); // Hash password
        }

        $pasien->update($updateData);

        return redirect()->route('admin.pasien.index')
            ->with([
                'message' => 'Pasien berhasil diperbarui!',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('admin.pasien.index')
            ->with([
                'message' => 'Pasien berhasil dihapus!',
                'alert-type' => 'success'
            ]);
    }
    
}