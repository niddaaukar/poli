<?php

namespace App\Models;

use App\Models\Pasien;
use App\Models\DaftarPoli;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Pasien extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'pasien';
    protected $fillable = ['nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm', 'password'];


    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    public function daftarPoli()
    {
        return $this->hasMany(DaftarPoli::class, 'id_pasien');
    }
}
