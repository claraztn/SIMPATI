<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenMataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dosen_mata_kuliah')->insert([
            ['nip' => '123456789', 'kode_mk' => 'TI101', 'tahun' => '2023'],
            ['nip' => '987654321', 'kode_mk' => 'MN201', 'tahun' => '2023'],
        ]);
    }
}
