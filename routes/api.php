<?php
use App\Http\Controllers\Api\JadwalController;

Route::get('/jadwal/{poli}', [JadwalController::class, 'getJadwalByPoli']);
