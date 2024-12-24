<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalPeriksaSeeder extends Seeder
{
    public function run()
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $existingSchedules = [];

        for ($i = 1; $i <= 25; $i++) {
            $id_dokter = rand(1, 15);
            $hari = $days[array_rand($days)];
            $jadwal = $this->generateUniqueSchedule($existingSchedules, $id_dokter, $hari);

            $existingActiveSchedule = DB::table('jadwal_periksa')
                ->where('id_dokter', $id_dokter)
                ->where('is_active', 1)
                ->first();

            if ($existingActiveSchedule) {
                DB::table('jadwal_periksa')
                    ->where('id', $existingActiveSchedule->id)
                    ->update(['is_active' => 0]);
            }

            DB::table('jadwal_periksa')->insert([
                'id_dokter' => $id_dokter,
                'hari' => $hari,
                'jam_mulai' => $jadwal['jam_mulai'],
                'jam_selesai' => $jadwal['jam_selesai'],
                'is_active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $existingSchedules[] = [
                'id_dokter' => $id_dokter,
                'hari' => $hari,
                'jam_mulai' => $jadwal['jam_mulai'],
                'jam_selesai' => $jadwal['jam_selesai'],
            ];
        }
    }

    private function generateUniqueSchedule($existingSchedules, $id_dokter, $hari)
    {
        do {
            $jam_mulai = $this->randomTime();
            $jam_selesai = $this->randomTimeAfter($jam_mulai);
            $isOverlapping = $this->checkOverlap($existingSchedules, $id_dokter, $hari, $jam_mulai, $jam_selesai);
        } while ($isOverlapping);

        return [
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
        ];
    }

    private function checkOverlap($existingSchedules, $id_dokter, $hari, $jam_mulai, $jam_selesai)
    {
        foreach ($existingSchedules as $schedule) {
            if ($schedule['id_dokter'] == $id_dokter && $schedule['hari'] == $hari) {
                if (
                    ($jam_mulai >= $schedule['jam_mulai'] && $jam_mulai < $schedule['jam_selesai']) || 
                    ($jam_selesai > $schedule['jam_mulai'] && $jam_selesai <= $schedule['jam_selesai']) || 
                    ($jam_mulai <= $schedule['jam_mulai'] && $jam_selesai >= $schedule['jam_selesai'])
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    private function randomTime()
    {
        $hours = rand(8, 17); // Jam mulai kerja (08:00 - 17:00)
        $minutes = rand(0, 59);
        return sprintf('%02d:%02d:00', $hours, $minutes);
    }

    private function randomTimeAfter($jam_mulai)
    {
        $start = strtotime($jam_mulai);
        $end = $start + rand(1800, 7200); // Tambah antara 30 menit sampai 2 jam
        return date('H:i:s', $end);
    }
}
