<?php

namespace Database\Seeders;

use DB; 
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {   
        DB::table('mahasiswa')->insert([
            [
                'nim' => '20220101',
                'nama_mahasiswa' => 'John Doe',
                'email' => 'student01@example.com',
                'alamat_mahasiswa' => 'Jl. Pendidikan No. 4',
                'no_telepon_mahasiswa' => '08122334455',
                'tanggal_lahir' => '2002-05-14',
                'jenis_kelamin' => 'Laki-laki',
                'status' => 'Aktif',
                'angkatan' => 2022,
                'dosen_wali' => '1234567890', 
                'id_user' => 1,  // Pastikan id_user adalah referensi ke tabel users
                'id_prodi' => '1', 
            ],
        ]);
    }
}
