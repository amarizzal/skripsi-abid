<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $schedules = [
            [
                'place' => 'Aula Kantor Pusat',
                'content' => 'Rapat Koordinasi Tahunan',
                'dresscode' => 'Batik',
                'audience' => 'INTERNAL',
                'disposition' => 'AGENDAKAN',
                'access_level' => 'PUBLIK',
                'date' => '2025-06-01 09:00:00',
                'file' => 'files/rapat_koordinasi.pdf',
            ],
            [
                'place' => 'Hotel Grand Malang',
                'content' => 'Seminar Nasional Kearsipan',
                'dresscode' => 'Resmi',
                'audience' => 'EKSTERNAL',
                'disposition' => 'DIWAKILI',
                'access_level' => 'RAHASIA',
                'date' => '2025-06-05 13:30:00',
                'file' => 'files/seminar_kearsipan.pdf',
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
