<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            PoliSeeder::class,  // Menjalankan PoliSeeder untuk seeding data poli
            AdminSeeder::class,  // Menjalankan AdminSeeder untuk seeding data admin
            PasienSeeder::class,  // Menjalankan PasienSeeder untuk seeding data pasien
            DokterSeeder::class,  // Menjalankan DokterSeeder untuk seeding data dokter
            ObatSeeder::class,  // Menjalankan ObatSeeder untuk seeding data obat
            JadwalPeriksaSeeder::class,  // Menjalankan JadwalPeriksaSeeder untuk seeding data jadwal periksa
        ]);
    }
}
