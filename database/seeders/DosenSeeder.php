<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            [
                'nip' => '1234567890',
                'nama_dosen' => 'Dr. John Doe',
                'alamat_dosen' => 'Jl. Akademik No.1, Jakarta',
                'no_telepon_dosen' => '081234567890',
                'email' => 'lecturer01@example.com',
                'role' => 'Dekan',
                'id_user' => 2, 
                'id_prodi' => '1', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '9876543210',
                'nama_dosen' => 'Prof. Jane Smith',
                'alamat_dosen' => 'Jl. Pendidikan No.2, Jakarta',
                'no_telepon_dosen' => '082345678901',
                'email_dosen' => 'lecturer02@example.com',
                'role' => 'Kaprodi',
                'id_user' => 3,
                'id_prodi' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '1112233445',
                'nama_dosen' => 'Dr. Sarah Lee',
                'alamat_dosen' => 'Jl. Teknologi No.3, Jakarta',
                'no_telepon_dosen' => '083456789012',
                'email_dosen' => 'lecturer03@example.com',
                'role' => 'PembimbingAkademik',
                'id_user' => 4,
                'id_prodi' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
