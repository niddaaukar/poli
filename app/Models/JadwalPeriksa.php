<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPeriksa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal_periksa';
    protected $fillable = ['id_dokter', 'hari', 'jam_mulai', 'jam_selesai', 'is_active'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id'); // Sesuaikan nama kolom jika berbeda
    }
}

