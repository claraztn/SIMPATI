<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwal')->insert([
            [
                'hari' => 'Senin',
                'id_ruang' => 1,
                'id_kelas' => 1,
                'jam_mulai' => '08:00:00',
                'sks' => 3,
                'status' => 'pending',
            ],
            [
                'hari' => 'Selasa',
                'id_ruang' => 2,
                'id_kelas' => 2,
                'jam_mulai' => '10:00:00',
                'sks' => 4,
                'status' => 'approved',
            ],
            [
                'hari' => 'Rabu',
                'id_ruang' => 3,
                'id_kelas' => 1,
                'jam_mulai' => '13:00:00',
                'sks' => 2,
                'status' => 'pending',
            ],
            [
                'hari' => 'Kamis',
                'id_ruang' => 4,
                'id_kelas' => 2,
                'jam_mulai' => '15:00:00',
                'sks' => 3,
                'status' => 'rejected',
            ],
            // [
            //     'hari' => 'Jumat',
            //     'id_ruang' => 5,
            //     'id_kelas' => 3,
            //     'jam_mulai' => '09:00:00',
            //     'sks' => 4,
            //     'status' => 'approved',
            // ],
        ]);
    }
}
