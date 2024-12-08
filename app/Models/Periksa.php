<?php

namespace App\Models;

use App\Models\Periksa;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periksa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'periksa';
    protected $fillable = ['id_daftar_poli', 'tgl_periksa', 'catatan', 'biaya_periksa'];

    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];
    

    public function daftarPoli()
    {
        return $this->belongsTo(DaftarPoli::class, 'id_daftar_poli');
    }

    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
}
