<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            ['kode_mk' => 'TI101', 'nama_mk' => 'Algoritma', 'semester' => 1, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => '1'],
            ['kode_mk' => 'MN201', 'nama_mk' => 'Manajemen Operasi', 'semester' => 2, 'sks' => 4, 'sifat' => 'Pilihan', 'id_prodi' => '2'],
        ]);
    }
}
