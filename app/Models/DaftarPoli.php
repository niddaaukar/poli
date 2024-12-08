<?php

namespace App\Models;

use App\Models\DaftarPoli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPoli extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'daftar_poli';
    protected $fillable = ['id_pasien', 'id_jadwal', 'keluhan', 'no_antrian'];


    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function jadwalPeriksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    public function periksa()
    {
        return $this->hasMany(Periksa::class, 'id_daftar_poli');
    }
}
