<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'admins';

    protected $fillable = [

        'nama',
        'alamat',
        'np_hp',
        'password',
    ];

    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];
}
