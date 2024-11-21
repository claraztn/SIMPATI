<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('program_studi')->insert([
            ['id_prodi' => '1', 'nama_prodi' => 'Teknik Informatika', 'id_fakultas' => '1'],
            ['id_prodi' => '2', 'nama_prodi' => 'Manajemen', 'id_fakultas' => '2'],
        ]);
    }
}
