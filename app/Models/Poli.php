<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\JadwalPeriksa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'poli';
    protected $fillable = ['nama_poli', 'keterangan'];

    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];
    

    public function jadwalPeriksa()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_poli');
    }
}
