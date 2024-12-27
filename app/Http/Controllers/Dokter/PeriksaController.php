<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    // Menampilkan daftar poli berdasarkan jadwal yang dimiliki oleh dokter yang sedang login
    public function index()
    {
        // Mendapatkan data dokter yang sedang login melalui guard 'dokter'
        $dokter = auth()->guard('dokter')->user();
        
        // Mengambil ID jadwal periksa dokter tersebut
        $jadwalId = $dokter->jadwalPeriksa->pluck('id');
        
        // Mengambil daftar poli berdasarkan jadwal periksa dokter
        $daftarPolis = DaftarPoli::whereIn('id_jadwal', $jadwalId)
            ->with('periksa') // Load relasi periksa untuk mendapatkan data pemeriksaan yang sudah dilakukan
            ->get();

        // Menampilkan halaman dengan daftar poli yang sudah diambil
        return view('dokter.periksa.index', compact('daftarPolis'));
    }

    // Menampilkan detail periksa untuk poli tertentu
    public function detail($id)
    {
        // Mendapatkan data dokter yang sedang login
        $dokter = auth()->guard('dokter')->user();
        
        // Mencari data DaftarPoli berdasarkan ID dan memuat relasi jadwalPeriksa
        $daftarpoli = DaftarPoli::with('jadwalPeriksa')->findOrFail($id);

        // Mengecek apakah jadwal periksa poli tersebut sesuai dengan dokter yang sedang login
        if ($daftarpoli->jadwalPeriksa->dokter->id != $dokter->id) {
            // Jika dokter yang memeriksa tidak sesuai, redirect dengan pesan error
            return redirect()->back()->with([
                'message' => 'Data tidak ditemukan',
                'alert-type' => 'error',
            ]);
        }

        // Mengambil semua data obat
        $obats = Obat::all();
        
        // Mencari data periksa yang terkait dengan poli ini
        $periksa = Periksa::where('id_daftar_poli', $id)->first();

        // Jika data periksa ada, ambil daftar obat yang digunakan dalam periksa
        // Jika tidak ada data periksa, buat array kosong untuk daftar obat
        $daftarObat = $periksa
            ? DetailPeriksa::where('id_periksa', $periksa->id)->pluck('id_obat')->toArray()
            : [];

        // Menampilkan halaman detail periksa dengan data poli, obat, dan periksa
        return view('dokter.periksa.detail', compact('daftarpoli', 'obats', 'periksa', 'daftarObat'));
    }

    // Menyimpan data periksa baru atau memperbarui data periksa yang sudah ada
    public function store(Request $request, $id)
    {
        // Validasi input dari form untuk memastikan catatan dan obat terpilih
        $request->validate([
            'catatan' => 'required', // Catatan wajib diisi
            'obat' => 'required|array|min:1', // Obat harus dipilih dan minimal 1
        ]);

        // Mencari data DaftarPoli berdasarkan ID yang diterima
        $daftarpoli = DaftarPoli::findOrFail($id);
        

        // Mengambil semua obat yang dipilih berdasarkan ID obat yang diterima dari form
        $obats = Obat::whereNull('deleted_at')->whereIn('id', $request->obat)->get();

        // Menghitung total biaya periksa, yang telah ditetapkan pada capstone ( 1 kali periksa = biaya dokter)
        $biaya = 150000;
        
        // Menambahkan biaya obat berdasarkan harga obat yang dipilih
        foreach ($obats as $obat) {
            $biaya += $obat->harga;
        }

        // Mencari atau membuat data pemeriksaan (Periksa) baru untuk poli yang dituju
        $periksa = Periksa::updateOrCreate(
            ['id_daftar_poli' => $daftarpoli->id], // Mencari data periksa yang sesuai
            [
                'tgl_periksa' => $daftarpoli->tgl_periksa, // Mengambil tanggal periksa dari DaftarPoli
                'catatan' => $request->catatan, // Menyimpan catatan
                'biaya_periksa' => $biaya // Menyimpan total biaya periksa
            ]
        );

        // Menghapus semua detail periksa sebelumnya untuk periksa yang dituju
        $periksa->detailPeriksa()->delete();

        // Menambahkan detail periksa baru berdasarkan obat yang dipilih
        foreach ($obats as $obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id, // Mengaitkan dengan periksa yang baru dibuat
                'id_obat' => $obat->id, // Menyimpan ID obat yang dipilih
            ]);
        }

        // Redirect ke halaman daftar periksa dengan pesan sukses
        return redirect()->route('dokter.periksa.index')->with([
            'message' => 'Periksa berhasil disimpan!',
            'alert-type' => 'success',
        ]);
    }
}
