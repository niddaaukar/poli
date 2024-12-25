<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        
        DB::table('obat')->insert([
                [
                    'nama_obat' => 'Paracetamol',
                    'kemasan' => 'Tablet',
                    'harga' => 5000
                ],
                [
                    'nama_obat' => 'Ibuprofen',
                    'kemasan' => 'Kapsul',
                    'harga' => 10000
                ],
                [
                    'nama_obat' => 'Cetirizine',
                    'kemasan' => 'Tablet',
                    'harga' => 4500
                ],
                [
                    'nama_obat' => 'Omeprazole',
                    'kemasan' => 'Kapsul',
                    'harga' => 11000
                ],
                [
                    'nama_obat' => 'Ranitidine',
                    'kemasan' => 'Tablet',
                    'harga' => 8000
                ],
                [
                    'nama_obat' => 'Ciprofloxacin Eye Drops',
                    'kemasan' => 'Botol',
                    'harga' => 25000
                ],
                [
                    'nama_obat' => 'Tobramycin',
                    'kemasan' => 'Botol',
                    'harga' => 30000
                ],
                [
                    'nama_obat' => 'Latanoprost',
                    'kemasan' => 'Botol',
                    'harga' => 45000
                ],
                [
                    'nama_obat' => 'Dexamethasone Eye Drops',
                    'kemasan' => 'Botol',
                    'harga' => 20000
                ],
                [
                    'nama_obat' => 'Aspirin',
                    'kemasan' => 'Tablet',
                    'harga' => 7000
                ],
                [
                    'nama_obat' => 'Clopidogrel',
                    'kemasan' => 'Tablet',
                    'harga' => 30000
                ],
                [
                    'nama_obat' => 'Simvastatin',
                    'kemasan' => 'Tablet',
                    'harga' => 14000
                ],
                [
                    'nama_obat' => 'Bisoprolol',
                    'kemasan' => 'Tablet',
                    'harga' => 18000
                ],
                [
                    'nama_obat' => 'Captopril',
                    'kemasan' => 'Tablet',
                    'harga' => 12000
                ],
                [
                    'nama_obat' => 'Paracetamol Syrup',
                    'kemasan' => 'Sirup',
                    'harga' => 8000
                ],
                [
                    'nama_obat' => 'Amoxicillin Syrup',
                    'kemasan' => 'Sirup',
                    'harga' => 12000
                ],
                [
                    'nama_obat' => 'Cetirizine Syrup',
                    'kemasan' => 'Sirup',
                    'harga' => 10000
                ],
                [
                    'nama_obat' => 'Domperidone Syrup',
                    'kemasan' => 'Sirup',
                    'harga' => 11000
                ],
                [
                    'nama_obat' => 'Salbutamol Syrup',
                    'kemasan' => 'Sirup',
                    'harga' => 14000
                ],
                [
                    'nama_obat' => 'Chlorpheniramine',
                    'kemasan' => 'Tablet',
                    'harga' => 4000
                ],
                [
                    'nama_obat' => 'Miconazole Oral Gel',
                    'kemasan' => 'Gel',
                    'harga' => 25000
                ],
                [
                    'nama_obat' => 'Hydrocortisone Ear Drops',
                    'kemasan' => 'Botol',
                    'harga' => 15000
                ],
                [
                    'nama_obat' => 'Oxymetazoline',
                    'kemasan' => 'Botol',
                    'harga' => 20000
                ],
                [
                    'nama_obat' => 'Azithromycin',
                    'kemasan' => 'Kapsul',
                    'harga' => 22000
                ],
            
        ]);
    }
}