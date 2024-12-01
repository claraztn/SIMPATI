<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            ['kode_mk' => 'PAIK6101', 'nama_mk' => 'Matematika I', 'semester' => 1, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6102', 'nama_mk' => 'Dasar Pemrograman', 'semester' => 1, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6103', 'nama_mk' => 'Dasar Sistem', 'semester' => 1, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6104', 'nama_mk' => 'Logika Informatika', 'semester' => 1, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6105', 'nama_mk' => 'Struktur Diskrit', 'semester' => 1, 'sks' => 4, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00003', 'nama_mk' => 'Pancasila dan Kewarganegaraan', 'semester' => 1, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00005', 'nama_mk' => 'Olahraga', 'semester' => 1, 'sks' => 1, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00007', 'nama_mk' => 'Bahasa Inggris', 'semester' => 1, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6201', 'nama_mk' => 'Matematika II', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6202', 'nama_mk' => 'Algoritma dan Pemrograman', 'semester' => 2, 'sks' => 4, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6203', 'nama_mk' => 'Organisasi dan Arsitektur Komputer', 'semester' => 2, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6204', 'nama_mk' => 'Aljabar Linier', 'semester' => 2, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00004', 'nama_mk' => 'Bahasa Indonesia', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00006', 'nama_mk' => 'Internet of Things (IoT)', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00011', 'nama_mk' => 'Pendidikan Agama Islam', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00021', 'nama_mk' => 'Pendidikan Agama Kristen', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00031', 'nama_mk' => 'Pendidikan Agama Katolik', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00041', 'nama_mk' => 'Pendidikan Agama Hindu', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00051', 'nama_mk' => 'Pendidikan Agama Buddha', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00061', 'nama_mk' => 'Pendidikan Agama Kong Hu Chu', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'UUW00071', 'nama_mk' => 'Aliran Kepercayaan terhadap Tuhan Yang Maha Esa', 'semester' => 2, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6301', 'nama_mk' => 'Struktur Data', 'semester' => 3, 'sks' => 4, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6302', 'nama_mk' => 'Sistem Operasi', 'semester' => 3, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6303', 'nama_mk' => 'Basis Data', 'semester' => 3, 'sks' => 4, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6304', 'nama_mk' => 'Metode Numerik', 'semester' => 3, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6305', 'nama_mk' => 'Interaksi Manusia dan Komputer', 'semester' => 3, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6306', 'nama_mk' => 'Statistika', 'semester' => 3, 'sks' => 2, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6401', 'nama_mk' => 'Pemrograman Berorientasi Objek', 'semester' => 4, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6402', 'nama_mk' => 'Jaringan Komputer', 'semester' => 4, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6403', 'nama_mk' => 'Manajemen Basis Data', 'semester' => 4, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6404', 'nama_mk' => 'Grafika dan Komputasi Visual', 'semester' => 4, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6405', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'semester' => 4, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1],
            ['kode_mk' => 'PAIK6406', 'nama_mk' => 'Sistem Cerdas', 'semester' => 4, 'sks' => 3, 'sifat' => 'Wajib', 'id_prodi' => 1]
        ]);
    }
}
