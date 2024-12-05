<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenMataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dosen_mata_kuliah')->insert([

            ['nip' => '9876543210', 'kode_mk' => 'PAIK6104', 'tahun' => '2023'],
            ['nip' => '9876543210', 'kode_mk' => 'PAIK6304', 'tahun' => '2023'],
        ]);
    }
}
