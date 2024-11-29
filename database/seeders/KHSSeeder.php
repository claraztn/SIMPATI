<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KHSSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('khs')->insert([
            ['nim' => '24060122120037', 'semester' => '5', 'kode_mk' => 'TI101', 'tahun' => '2023', 'skssemester' => 20, 'skskumulatif' => 100, 'ipsemester' => 3.75, 'ipkumulatif' => 3.65, 'scankhs' => 'file_path_1.pdf', 'isverified' => 1],

            

            // ['nim' => '1902002', 'semester' => '3', 'kode_mk' => 'MN201', 'tahun' => '2023', 'skssemester' => 18, 'skskumulatif' => 70, 'ipsemester' => 3.50, 'ipkumulatif' => 3.45, 'scankhs' => 'file_path_2.pdf', 'isverified' => 0],

        ]);
    }
}
