<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruangan')->insert([
            ['id_ruang' => 1, 'nama_ruang' => 'A101', 'gedung' => 'A'],
            ['id_ruang' => 2, 'nama_ruang' => 'A102', 'gedung' => 'A'],
            ['id_ruang' => 3, 'nama_ruang' => 'A103', 'gedung' => 'A'],
            ['id_ruang' => 4, 'nama_ruang' => 'A201', 'gedung' => 'A'],
            ['id_ruang' => 5, 'nama_ruang' => 'A202', 'gedung' => 'A'],
            ['id_ruang' => 6, 'nama_ruang' => 'A203', 'gedung' => 'A'],
            ['id_ruang' => 7, 'nama_ruang' => 'A301', 'gedung' => 'A'],
            ['id_ruang' => 8, 'nama_ruang' => 'A302', 'gedung' => 'A'],
            ['id_ruang' => 9, 'nama_ruang' => 'A303', 'gedung' => 'A'],
            ['id_ruang' => 10, 'nama_ruang' => 'B101', 'gedung' => 'B'],
            ['id_ruang' => 11, 'nama_ruang' => 'B102', 'gedung' => 'B'],
            ['id_ruang' => 12, 'nama_ruang' => 'B103', 'gedung' => 'B'],
            ['id_ruang' => 13, 'nama_ruang' => 'B201', 'gedung' => 'B'],
            ['id_ruang' => 14, 'nama_ruang' => 'B202', 'gedung' => 'B'],
            ['id_ruang' => 15, 'nama_ruang' => 'B203', 'gedung' => 'B'],
            ['id_ruang' => 16, 'nama_ruang' => 'B301', 'gedung' => 'B'],
            ['id_ruang' => 17, 'nama_ruang' => 'B302', 'gedung' => 'B'],
            ['id_ruang' => 18, 'nama_ruang' => 'B303', 'gedung' => 'B'],
            ['id_ruang' => 19, 'nama_ruang' => 'C101', 'gedung' => 'C'],
            ['id_ruang' => 20, 'nama_ruang' => 'C102', 'gedung' => 'C'],
            ['id_ruang' => 21, 'nama_ruang' => 'C103', 'gedung' => 'C'],
            ['id_ruang' => 22, 'nama_ruang' => 'C201', 'gedung' => 'C'],
            ['id_ruang' => 23, 'nama_ruang' => 'C202', 'gedung' => 'C'],
            ['id_ruang' => 24, 'nama_ruang' => 'C203', 'gedung' => 'C'],
            ['id_ruang' => 25, 'nama_ruang' => 'C301', 'gedung' => 'C'],
            ['id_ruang' => 26, 'nama_ruang' => 'C302', 'gedung' => 'C'],
            ['id_ruang' => 27, 'nama_ruang' => 'C303', 'gedung' => 'C'],
            ['id_ruang' => 28, 'nama_ruang' => 'D101', 'gedung' => 'D'],
            ['id_ruang' => 29, 'nama_ruang' => 'D102', 'gedung' => 'D'],
            ['id_ruang' => 30, 'nama_ruang' => 'D103', 'gedung' => 'D'],
            ['id_ruang' => 31, 'nama_ruang' => 'D201', 'gedung' => 'D'],
            ['id_ruang' => 32, 'nama_ruang' => 'D202', 'gedung' => 'D'],
            ['id_ruang' => 33, 'nama_ruang' => 'D203', 'gedung' => 'D'],
            ['id_ruang' => 34, 'nama_ruang' => 'D301', 'gedung' => 'D'],
            ['id_ruang' => 35, 'nama_ruang' => 'D302', 'gedung' => 'D'],
            ['id_ruang' => 36, 'nama_ruang' => 'D303', 'gedung' => 'D'],
            ['id_ruang' => 37, 'nama_ruang' => 'E101', 'gedung' => 'E'],
            ['id_ruang' => 38, 'nama_ruang' => 'E102', 'gedung' => 'E'],
            ['id_ruang' => 39, 'nama_ruang' => 'E103', 'gedung' => 'E'],
            ['id_ruang' => 40, 'nama_ruang' => 'E201', 'gedung' => 'E'],
            ['id_ruang' => 41, 'nama_ruang' => 'E202', 'gedung' => 'E'],
            ['id_ruang' => 42, 'nama_ruang' => 'E203', 'gedung' => 'E'],
            ['id_ruang' => 43, 'nama_ruang' => 'E301', 'gedung' => 'E'],
            ['id_ruang' => 44, 'nama_ruang' => 'E302', 'gedung' => 'E'],
            ['id_ruang' => 45, 'nama_ruang' => 'E303', 'gedung' => 'E'],
            ['id_ruang' => 46, 'nama_ruang' => 'F101', 'gedung' => 'F'],
            ['id_ruang' => 47, 'nama_ruang' => 'F102', 'gedung' => 'F'],
            ['id_ruang' => 48, 'nama_ruang' => 'F103', 'gedung' => 'F'],
            ['id_ruang' => 49, 'nama_ruang' => 'F201', 'gedung' => 'F'],
            ['id_ruang' => 50, 'nama_ruang' => 'F202', 'gedung' => 'F'],
            ['id_ruang' => 51, 'nama_ruang' => 'F203', 'gedung' => 'F'],
            ['id_ruang' => 52, 'nama_ruang' => 'F301', 'gedung' => 'F'],
            ['id_ruang' => 53, 'nama_ruang' => 'F302', 'gedung' => 'F'],
            ['id_ruang' => 54, 'nama_ruang' => 'F303', 'gedung' => 'F'],
            ['id_ruang' => 55, 'nama_ruang' => 'G101', 'gedung' => 'G'],
            ['id_ruang' => 56, 'nama_ruang' => 'G102', 'gedung' => 'G'],
            ['id_ruang' => 57, 'nama_ruang' => 'G103', 'gedung' => 'G'],
            ['id_ruang' => 58, 'nama_ruang' => 'G201', 'gedung' => 'G'],
            ['id_ruang' => 59, 'nama_ruang' => 'G202', 'gedung' => 'G'],
            ['id_ruang' => 60, 'nama_ruang' => 'G203', 'gedung' => 'G'],
            ['id_ruang' => 61, 'nama_ruang' => 'G301', 'gedung' => 'G'],
            ['id_ruang' => 62, 'nama_ruang' => 'G302', 'gedung' => 'G'],
            ['id_ruang' => 63, 'nama_ruang' => 'G303', 'gedung' => 'G'],
        ]);
    }
}
