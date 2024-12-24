<?php

namespace App\Models;

use App\Models\Obat;
use App\Models\DetailPeriksa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'obat';
    protected $fillable = ['nama_obat', 'kemasan', 'harga'];

    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];
    

    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }
}
