<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('program_studi')->insert([
            ['id' => 1, 'nama_prodi' => 'Teknik Informatika', 'fakultas_id' => 1],
            ['id' => 2, 'nama_prodi' => 'Manajemen', 'fakultas_id' => 2],
        ]);
    }
}
