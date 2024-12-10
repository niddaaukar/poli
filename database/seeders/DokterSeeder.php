<?php

namespace Database\Seeders;


use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Database\Seeders\DokterSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakerLocale = env('APP_FAKER_LOCAL', 'en_US');

     $faker = FAKER::create($fakerLocale);

     for ($i = 1; $i <= 15; $i++) {
        DB::table('dokter')->insert([
            'nama' => $faker->name, // Nama pasien
            'alamat' => $faker->address, // Alamat pasien
            'no_hp' => '08' . $faker->unique()->numerify('##########'), // No HP yang dimulai dengan '08' dan panjang 12 digit
            'password' => Hash::make('12345678'), // Password default yang sudah di-hash
            'id_poli'=> $i, 
        ]);
    }
    }
}
