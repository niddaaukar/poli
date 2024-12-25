<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Mengisi 10 data ke dalam tabel 'poli'
        DB::table('poli')->insert([
            ['nama_poli' => 'Poli Umum', 'keterangan' => 'Pemeriksaan kesehatan dasar untuk segala keluhan medis.'],
            ['nama_poli' => 'Poli Kesehatan Anak', 'keterangan' => 'Fasilitas untuk pemeriksaan dan pengobatan kesehatan anak.'],
            ['nama_poli' => 'Poli Gigi', 'keterangan' => 'Fokus pada perawatan dan kesehatan gigi serta mulut.'],
            ['nama_poli' => 'Poli Mata', 'keterangan' => 'Melayani pemeriksaan dan terapi untuk kesehatan mata.'],
            ['nama_poli' => 'Poli Telinga Hidung Tenggorokan (THT)', 'keterangan' => 'Layanan medis untuk keluhan pada telinga, hidung, dan tenggorokan.'],
            ['nama_poli' => 'Poli Penyakit Dalam', 'keterangan' => 'Pelayanan medis untuk penyakit dalam tubuh seperti diabetes dan hipertensi.'],
            ['nama_poli' => 'Poli Jantung', 'keterangan' => 'Pelayanan medis untuk penyakit jantung dan pembuluh darah.'],
            ['nama_poli' => 'Poli Paru', 'keterangan' => 'Pelayanan medis untuk penyakit paru-paru dan pernapasan.'],
            ['nama_poli' => 'Poli Saraf', 'keterangan' => 'Pelayanan medis untuk masalah saraf dan neurologis.'],
            ['nama_poli' => 'Poli Gizi', 'keterangan' => 'Pelayanan medis untuk masalah gizi dan diet.']
        ]);
    }
}
