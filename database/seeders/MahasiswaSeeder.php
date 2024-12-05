<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('mahasiswa')->insert([
            [
                'nim' => '24060122120037',
                'nama_mahasiswa' => 'Widiawati Sihaloho',
                'email' => 'widiasihaloho@students.undip.ac.id',
                'alamat_mahasiswa' => 'Jl. Pendidikan No. 4',
                'no_telepon_mahasiswa' => '08122334455',
                'tanggal_lahir' => '2002-05-14',
                'jenis_kelamin' => 'Perempuan',
                'status' => 'Aktif',
<<<<<<< HEAD
                'angkatan' => 2022,
                'kode_kelas' => 'A',
                'dosen_wali' => '1234567890',
                'id_user' => 1,
                'id_prodi' => '1',
=======
                'angkatan' => 2023,
                'dosen_wali' => '1234567890', 
                'id_user' => 1,  
                'id_prodi' => '1', 
>>>>>>> 97cbb3aca2c0ba92c27428880912265a3201bfdb
            ],
        ]);
    }
}