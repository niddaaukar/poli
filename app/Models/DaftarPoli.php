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
    protected $fillable = ['id_pasien', 'id_jadwal', 'tgl_periksa', 'keluhan', 'no_antrian'];


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
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal', 'id');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id');
    }
    public function periksa()
    {
        return $this->hasOne(Periksa::class, 'id_daftar_poli');
    }
}
