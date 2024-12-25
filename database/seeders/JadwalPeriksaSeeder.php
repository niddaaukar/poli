<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalPeriksaSeeder extends Seeder
{
    public function run()
    {
        // Array hari yang digunakan untuk memilih hari jadwal
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        
        // Menyimpan jadwal yang sudah ada untuk memeriksa overlap (tumpang tindih)
        $existingSchedules = [];

        // Loop untuk menambah 25 jadwal dokter
        for ($i = 1; $i <= 25; $i++) {
            // Pilih id_dokter secara acak (dokter ke-1 hingga ke-15)
            $id_dokter = rand(1, 15);
            
            // Pilih hari secara acak dari array $days
            $hari = $days[array_rand($days)];
            
            // Menghasilkan jadwal yang unik dan tidak tumpang tindih
            $jadwal = $this->generateUniqueSchedule($existingSchedules, $id_dokter, $hari);

            // Mengecek apakah ada jadwal aktif sebelumnya untuk dokter tersebut
            $existingActiveSchedule = DB::table('jadwal_periksa')
                ->where('id_dokter', $id_dokter)
                ->where('is_active', 1)
                ->first();

            // Jika ada jadwal aktif, matikan statusnya (set is_active = 0)
            if ($existingActiveSchedule) {
                DB::table('jadwal_periksa')
                    ->where('id', $existingActiveSchedule->id)
                    ->update(['is_active' => 0]);
            }

            // Menambahkan jadwal baru ke dalam tabel jadwal_periksa
            DB::table('jadwal_periksa')->insert([
                'id_dokter' => $id_dokter,
                'hari' => $hari,
                'jam_mulai' => $jadwal['jam_mulai'],
                'jam_selesai' => $jadwal['jam_selesai'],
                'is_active' => 1,  // Jadwal ini dianggap aktif
                'created_at' => Carbon::now(),  // Tanggal dan waktu pembuatan
                'updated_at' => Carbon::now(),  // Tanggal dan waktu update
            ]);

            // Menambahkan jadwal ke array existingSchedules agar tidak tumpang tindih di jadwal selanjutnya
            $existingSchedules[] = [
                'id_dokter' => $id_dokter,
                'hari' => $hari,
                'jam_mulai' => $jadwal['jam_mulai'],
                'jam_selesai' => $jadwal['jam_selesai'],
            ];
        }
    }

    // Fungsi untuk menghasilkan jadwal unik yang tidak tumpang tindih
    private function generateUniqueSchedule($existingSchedules, $id_dokter, $hari)
    {
        do {
            // Menghasilkan jam mulai secara acak
            $jam_mulai = $this->randomTime();
            
            // Menghasilkan jam selesai setelah jam mulai
            $jam_selesai = $this->randomTimeAfter($jam_mulai);
            
            // Mengecek apakah jadwal ini tumpang tindih dengan jadwal yang sudah ada
            $isOverlapping = $this->checkOverlap($existingSchedules, $id_dokter, $hari, $jam_mulai, $jam_selesai);
        } while ($isOverlapping);  // Jika tumpang tindih, coba lagi dengan jadwal baru

        // Mengembalikan jam mulai dan jam selesai untuk jadwal yang valid
        return [
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
        ];
    }

    // Fungsi untuk memeriksa apakah jadwal baru tumpang tindih dengan jadwal yang sudah ada
    private function checkOverlap($existingSchedules, $id_dokter, $hari, $jam_mulai, $jam_selesai)
    {
        // Periksa semua jadwal yang ada
        foreach ($existingSchedules as $schedule) {
            // Cek apakah jadwal dokter dan hari cocok dan apakah ada tumpang tindih waktu
            if ($schedule['id_dokter'] == $id_dokter && $schedule['hari'] == $hari) {
                // Cek apakah jam mulai atau jam selesai tumpang tindih dengan jadwal yang sudah ada
                if (
                    ($jam_mulai >= $schedule['jam_mulai'] && $jam_mulai < $schedule['jam_selesai']) || 
                    ($jam_selesai > $schedule['jam_mulai'] && $jam_selesai <= $schedule['jam_selesai']) || 
                    ($jam_mulai <= $schedule['jam_mulai'] && $jam_selesai >= $schedule['jam_selesai'])
                ) {
                    return true;  // Jadwal tumpang tindih, kembalikan true
                }
            }
        }

        return false;  // Tidak ada tumpang tindih, kembalikan false
    }

    // Fungsi untuk menghasilkan waktu secara acak (jam dan menit)
    private function randomTime()
    {
        // Jam mulai antara 08:00 hingga 17:00
        $hours = rand(8, 17);  // Jam antara 8 pagi hingga 5 sore
        $minutes = rand(0, 59);  // Menit antara 00 hingga 59
        return sprintf('%02d:%02d:00', $hours, $minutes);  // Format jam:menit:detik
    }

    // Fungsi untuk menghasilkan waktu selesai setelah waktu mulai
    private function randomTimeAfter($jam_mulai)
    {
        // Mengonversi waktu mulai ke timestamp
        $start = strtotime($jam_mulai);
        
        // Menambahkan waktu acak antara 30 menit hingga 2 jam
        $end = $start + rand(1800, 7200);  // Tambah antara 30 menit (1800 detik) hingga 2 jam (7200 detik)
        
        // Mengembalikan jam selesai dalam format H:i:s
        return date('H:i:s', $end);
    }
}
