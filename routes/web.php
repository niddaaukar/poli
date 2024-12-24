<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RegisterController;

// admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DokterController as AdminDokterController;
use App\Http\Controllers\Admin\PasienController as AdminPasienController;
use App\Http\Controllers\Admin\PoliController as AdminPoliController;
use App\Http\Controllers\Admin\ObatController as AdminObatController;

// dokter
use App\Http\Controllers\Dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\Dokter\PeriksaController as DokterPeriksaController;
use App\Http\Controllers\Dokter\JadwalPeriksaController as DokterJadwalPeriksaController;
use App\Http\Controllers\Dokter\ProfileController as DokterProfileController;
use App\Http\Controllers\Dokter\RiwayatPasienController as DokterRiwayatPasienController;


// pasien
use App\Http\Controllers\Pasien\ProfileController as PasienProfileController;
use App\Http\Controllers\Pasien\RiwayatController as PasienRiwayatController;


// homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/riwayat', [PasienRiwayatController::class, 'index'])->name('riwayat.index');

// Authentication: Login & Register
Route::get('/login', [LoginController::class, 'index'])->name('login'); // Form login
Route::post('/login', [LoginController::class, 'login'])->name('login'); // Proses login

Route::get('/register', [RegisterController::class, 'index'])->name('register'); // Form register
Route::post('/register', [RegisterController::class, 'store'])->name('register'); // Proses register

Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout

Route::middleware(['auth:admin'])->group(function () {

    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD Dokter
    Route::prefix('/admin/dokter')->group(function () {
        Route::get('/', [AdminDokterController::class, 'index'])->name('admin.dokter.index');
        Route::get('/create', [AdminDokterController::class, 'create'])->name('admin.dokter.create');
        Route::post('/store', [AdminDokterController::class, 'store'])->name('admin.dokter.store');
        Route::get('/edit/{id}', [AdminDokterController::class, 'edit'])->name('admin.dokter.edit');
        Route::put('/{dokter}', [AdminDokterController::class, 'update'])->name('admin.dokter.update');
        Route::delete('/{dokter}', [AdminDokterController::class, 'destroy'])->name('admin.dokter.destroy');
    });
    
    // CRUD Pasien
    Route::prefix('/admin/pasien')->group(function () {
        Route::get('/', [AdminPasienController::class, 'index'])->name('admin.pasien.index');
        Route::get('/create', [AdminPasienController::class, 'create'])->name('admin.pasien.create');
        Route::post('/store', [AdminPasienController::class, 'store'])->name('admin.pasien.store');
        Route::get('/edit/{id}', [AdminPasienController::class, 'edit'])->name('admin.pasien.edit');
        Route::put('/{pasien}', [AdminPasienController::class, 'update'])->name('admin.pasien.update');
        Route::delete('/{pasien}', [AdminPasienController::class, 'destroy'])->name('admin.pasien.destroy');
    });
    
    // CRUD Poli
    Route::prefix('/admin/poli')->group(function () {
        Route::get('/', [AdminPoliController::class, 'index'])->name('admin.poli.index');
        Route::get('/create', [AdminPoliController::class, 'create'])->name('admin.poli.create');
        Route::post('/store', [AdminPoliController::class, 'store'])->name('admin.poli.store');
        Route::get('/edit/{id}', [AdminPoliController::class, 'edit'])->name('admin.poli.edit');
        Route::put('/{poli}', [AdminPoliController::class, 'update'])->name('admin.poli.update');
        Route::delete('/{poli}', [AdminPoliController::class, 'destroy'])->name('admin.poli.destroy');
    });
    
    // CRUD Obat
    Route::prefix('/admin/obat')->group(function () {
        Route::get('/', [AdminObatController::class, 'index'])->name('admin.obat.index');
        Route::get('/create', [AdminObatController::class, 'create'])->name('admin.obat.create');
        Route::post('/store', [AdminObatController::class, 'store'])->name('admin.obat.store');
        Route::get('/edit/{id}', [AdminObatController::class, 'edit'])->name('admin.obat.edit');
        Route::put('/{obat}', [AdminObatController::class, 'update'])->name('admin.obat.update');
        Route::delete('/{obat}', [AdminObatController::class, 'destroy'])->name('admin.obat.destroy');
    });
});

Route::middleware(['auth:dokter'])->group(function () {

    // Dokter Dashboard 
    Route::get('/dokter/dashboard', [DokterDashboardController::class, 'index'])->name('dokter.dashboard');
    
    // Periksa
    Route::get('/dokter/periksa', [DokterPeriksaController::class, 'index'])->name('dokter.periksa.index');
    Route::get('/dokter/periksa/detail/{id}', [DokterPeriksaController::class, 'detail'])->name('dokter.periksa.detail');
    Route::post('/dokter/periksa/store/{id}', [DokterPeriksaController::class, 'store'])->name('dokter.periksa.store');
    Route::put('/dokter/periksa/{id}', [DokterPeriksaController::class, 'update'])->name('dokter.periksa.update');
    Route::delete('/dokter/periksa/{id}', [DokterPeriksaController::class, 'destroy'])->name('dokter.periksa.destroy');

    // Jadwal Periksa
    Route::get('/dokter/jadwal', [DokterJadwalPeriksaController::class, 'index'])->name('dokter.jadwal_periksa.index');
    Route::post('/dokter/jadwal', [DokterJadwalPeriksaController::class, 'store'])->name('dokter.jadwal_periksa.store');
    Route::patch('/jadwal-periksa/{id}/activate', [DokterJadwalPeriksaController::class, 'activate'])->name('dokter.jadwal_periksa.activate');
    Route::patch('/jadwal-periksa/{id}/deactivate', [DokterJadwalPeriksaController::class, 'deactivate'])->name('dokter.jadwal_periksa.deactivate');
    Route::get('/dokter/riwayat-pasien', [DokterRiwayatPasienController::class, 'index'])->name('dokter.riwayat_pasien.index');
    Route::get('/dokter/riwayat-pasien/{id}', [DokterRiwayatPasienController::class, 'show'])->name('dokter.riwayat_pasien.detail');

     //Profil
     Route::get('/dokter/profil', [DokterProfileController::class, 'index'])->name('dokter.profil.index');
     Route::post('/dokter/profil', [DokterProfileController::class, 'edit'])->name('dokter.profil.edit');
     Route::post('/dokter/password', [DokterProfileController::class, 'editPassword'])->name('dokter.password.edit');


    });

    // Riwayat
    Route::middleware(['auth:pasien'])->group(function () {
    Route::get('/pasien/riwayat', [PasienRiwayatController::class, 'index'])->name('pasien.riwayat.index');
    Route::get('/pasien/get-jadwal/{id_poli}/{hari}', [PasienRiwayatController::class, 'getJadwal'])->name('pasien.get-jadwal');
    Route::post('/pasien/daftar-poli', [PasienRiwayatController::class, 'daftarPoli'])->name('pasien.daftar_poli');
    Route::get('/pasien/riwayat/detail/{id}', [PasienRiwayatController::class, 'detail'])->name('pasien.riwayat.detail');
    //profile Pasien
    Route::get('/pasien/profil', [PasienProfileController::class, 'index'])->name('pasien.profil.index');
    Route::post('/profil/update', [PasienProfileController::class, 'updateProfile'])->name('pasien.profil.update');
    Route::post('/profil/update-password', [PasienProfileController::class, 'updatePassword'])->name('pasien.profil.update-password');
    
    });

   





