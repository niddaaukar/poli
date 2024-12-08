<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dokter';
    protected $fillable = ['nama', 'alamat', 'no_hp', 'password', 'id_poli'];

    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];
    
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id');
    }

    public function jadwalPeriksa()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter', 'id');
    }
}
