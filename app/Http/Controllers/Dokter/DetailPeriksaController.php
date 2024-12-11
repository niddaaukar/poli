<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DetailPeriksa;
use App\Models\Periksa;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailPeriksaController extends Controller
{
    public function index($periksaId)
    {
        $details = DetailPeriksa::with('obat')->where('id_periksa', $periksaId)->paginate(10);
        return view('dokter.detail_periksa.index', compact('details', 'periksaId'));
    }

    public function create($periksaId)
    {
        $obats = Obat::all();
        return view('dokter.detail_periksa.create', compact('obats', 'periksaId'));
    }

    public function store(Request $request, $periksaId)
    {
        $validated = $request->validate([
            'id_obat' => 'required|exists:obats,id',
        ]);

        DetailPeriksa::create([
            'id_periksa' => $periksaId,
            'id_obat' => $validated['id_obat'],
        ]);

        return redirect()->route('dokter.detail_periksa.index', $periksaId)->with('success', 'Obat berhasil ditambahkan.');
    }

    public function destroy($periksaId, $id)
    {
        $detail = DetailPeriksa::findOrFail($id);
        $detail->delete();

        return redirect()->route('dokter.detail_periksa.index', $periksaId)->with('success', 'Obat berhasil dihapus.');
    }
}
