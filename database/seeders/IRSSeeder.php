<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IRSSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('IRS')->insert([

            ['nim' => '20220101', 'semester' => '5', 'jmlsks' => 20, 'scansks' => 'file_path_1.pdf', 'isverified' => 1, 'kode_kelas' => 'A'],
            ['nim' => '20220101', 'semester' => '3', 'jmlsks' => 18, 'scansks' => 'file_path_2.pdf', 'isverified' => 0, 'kode_kelas' => 'B'],

            // ['nim' => '20220101', 'semester' => '5', 'jmlsks' => 20, 'scansks' => 'file_path_1.pdf', 'isverified' => 1, 'id_kelas' => 1],
            // ['nim' => '1902002', 'semester' => '3', 'jmlsks' => 18, 'scansks' => 'file_path_2.pdf', 'isverified' => 0, 'id_kelas' => 2],
        ]);
    }
}
