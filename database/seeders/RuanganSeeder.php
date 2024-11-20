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
            // Gedung A
            ['id_ruang' => 1, 'nama_ruang' => 'A101', 'gedung' => 'A', 'kapasitas' => 50, 'status' => 'pending'],
            ['id_ruang' => 2, 'nama_ruang' => 'A102', 'gedung' => 'A', 'kapasitas' => 60, 'status' => 'pending'],
            ['id_ruang' => 3, 'nama_ruang' => 'A103', 'gedung' => 'A', 'kapasitas' => 70, 'status' => 'approved'],
            ['id_ruang' => 4, 'nama_ruang' => 'A201', 'gedung' => 'A', 'kapasitas' => 80, 'status' => 'pending'],
            ['id_ruang' => 5, 'nama_ruang' => 'A202', 'gedung' => 'A', 'kapasitas' => 90, 'status' => 'rejected'],
            ['id_ruang' => 6, 'nama_ruang' => 'A203', 'gedung' => 'A', 'kapasitas' => 100, 'status' => 'pending'],
        
            // Gedung B
            ['id_ruang' => 7, 'nama_ruang' => 'B101', 'gedung' => 'B', 'kapasitas' => 50, 'status' => 'approved'],
            ['id_ruang' => 8, 'nama_ruang' => 'B102', 'gedung' => 'B', 'kapasitas' => 60, 'status' => 'pending'],
            ['id_ruang' => 9, 'nama_ruang' => 'B103', 'gedung' => 'B', 'kapasitas' => 70, 'status' => 'rejected'],
            ['id_ruang' => 10, 'nama_ruang' => 'B201', 'gedung' => 'B', 'kapasitas' => 80, 'status' => 'pending'],
            ['id_ruang' => 11, 'nama_ruang' => 'B202', 'gedung' => 'B', 'kapasitas' => 90, 'status' => 'approved'],
            ['id_ruang' => 12, 'nama_ruang' => 'B203', 'gedung' => 'B', 'kapasitas' => 100, 'status' => 'pending'],
        
            // Gedung C
            ['id_ruang' => 13, 'nama_ruang' => 'C101', 'gedung' => 'C', 'kapasitas' => 50, 'status' => 'rejected'],
            ['id_ruang' => 14, 'nama_ruang' => 'C102', 'gedung' => 'C', 'kapasitas' => 60, 'status' => 'pending'],
            ['id_ruang' => 15, 'nama_ruang' => 'C103', 'gedung' => 'C', 'kapasitas' => 70, 'status' => 'approved'],
            ['id_ruang' => 16, 'nama_ruang' => 'C201', 'gedung' => 'C', 'kapasitas' => 80, 'status' => 'pending'],
            ['id_ruang' => 17, 'nama_ruang' => 'C202', 'gedung' => 'C', 'kapasitas' => 90, 'status' => 'rejected'],
            ['id_ruang' => 18, 'nama_ruang' => 'C203', 'gedung' => 'C', 'kapasitas' => 100, 'status' => 'pending'],
        
            // Gedung D
            ['id_ruang' => 19, 'nama_ruang' => 'D101', 'gedung' => 'D', 'kapasitas' => 50, 'status' => 'pending'],
            ['id_ruang' => 20, 'nama_ruang' => 'D102', 'gedung' => 'D', 'kapasitas' => 60, 'status' => 'pending'],
            ['id_ruang' => 21, 'nama_ruang' => 'D103', 'gedung' => 'D', 'kapasitas' => 70, 'status' => 'approved'],
            ['id_ruang' => 22, 'nama_ruang' => 'D201', 'gedung' => 'D', 'kapasitas' => 80, 'status' => 'rejected'],
            ['id_ruang' => 23, 'nama_ruang' => 'D202', 'gedung' => 'D', 'kapasitas' => 90, 'status' => 'pending'],
            ['id_ruang' => 24, 'nama_ruang' => 'D203', 'gedung' => 'D', 'kapasitas' => 100, 'status' => 'pending'],
        
            // Gedung E
            ['id_ruang' => 25, 'nama_ruang' => 'E101', 'gedung' => 'E', 'kapasitas' => 50, 'status' => 'approved'],
            ['id_ruang' => 26, 'nama_ruang' => 'E102', 'gedung' => 'E', 'kapasitas' => 60, 'status' => 'pending'],
            ['id_ruang' => 27, 'nama_ruang' => 'E103', 'gedung' => 'E', 'kapasitas' => 70, 'status' => 'rejected'],
            ['id_ruang' => 28, 'nama_ruang' => 'E201', 'gedung' => 'E', 'kapasitas' => 80, 'status' => 'pending'],
            ['id_ruang' => 29, 'nama_ruang' => 'E202', 'gedung' => 'E', 'kapasitas' => 90, 'status' => 'approved'],
            ['id_ruang' => 30, 'nama_ruang' => 'E203', 'gedung' => 'E', 'kapasitas' => 100, 'status' => 'pending'],
        ]);
        
    }
}
