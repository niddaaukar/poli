<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([

            'nama' => 'Nida Aulia',
            'alamat' => 'Comal',
            'no_hp' => '089619636519',
            'password' => Hash::make('NidaAuliaK13'),
        ]);
    }
}
