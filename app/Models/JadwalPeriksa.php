<?php

namespace App\Models;

use App\Models\JadwalPeriksa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPeriksa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal_periksa';
    protected $fillable = ['id_dokter', 'hari', 'jam_mulai', 'jam_selesai'];

    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];
    

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function daftarPoli()
    {
        return $this->hasMany(DaftarPoli::class, 'id_jadwal');
    }
}
