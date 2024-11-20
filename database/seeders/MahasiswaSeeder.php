<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaTableSeeder extends Seeder
{
    public function run()
    {
        Mahasiswa::create([
            'nim' => '20220101',
            'nama_mahasiswa' => 'John Doe',
            'email_mahasiswa' => 'mahasiswa@example.com',
            'alamat_mahasiswa' => 'Jl. Pendidikan No. 4',
            'no_telepon_mahasiswa' => '08122334455',
            'tanggal_lahir' => '2002-05-14',
            'jenis_kelamin' => 'Laki-laki',
            'status' => 'Aktif',
            'angkatan' => 2022,
            'dosen_wali' => '87654321', 
            'user_id' => 4, 
            'prodi_id' => 1, 
        ]);
    }
}
