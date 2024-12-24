<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DashboardController;

class DashboardController extends Controller
{
    //
    public function index(){

       // Mengambil 5 pasien terbaru berdasarkan waktu pembuatan (created_at) secara descending
       $pasiens = Pasien::orderBy('created_at', 'desc')->take(5)->get();

       // Mengembalikan tampilan halaman dashboard dan mengirimkan data 'pasiens' yang telah diambil
       return view('admin.dashboard.index', compact('pasiens'));
    }
}
