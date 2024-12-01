<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            ['kode_kelas' => 'A', 'kode_mk' => 'PAIK6304', 'tahun' => 2023, 'kuota' => 40],
            ['kode_kelas' => 'B', 'kode_mk' => 'PAIK6104', 'tahun' => 2023, 'kuota' => 30],
        ]);
    }
}