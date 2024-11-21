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

//         // Dosen sebagai Dekan
//         Dosen::create([
//             'nip' => '12345678',
//             'nama_dosen' => 'Dr. Ali Dekan',
//             'email_dosen' => 'dekan@example.com',
//             'alamat_dosen' => 'Jl. Teknik No. 1',
//             'no_telepon_dosen' => '08123456789',
//             'role' => 'Dekan',
//             'user_id' => 1, 
//         ]);

//         // Dosen sebagai Dosen Wali
//         Dosen::create([
//             'nip' => '87654321',
//             'nama_dosen' => 'Dr. Budi Dosen Wali',
//             'email_dosen' => 'dosenwali@example.com',
//             'alamat_dosen' => 'Jl. Ilmu No. 2',
//             'no_telepon_dosen' => '08198765432',
//             'role' => 'PembimbingAkademik',
//             'user_id' => 2,
//         ]);

//         // Dosen sebagai Kaprodi
//         Dosen::create([
//             'nip' => '11223344',
//             'nama_dosen' => 'Dr. Citra Kaprodi',
//             'email_dosen' => 'kaprodi@example.com',
//             'alamat_dosen' => 'Jl. Prodi No. 3',
//             'no_telepon_dosen' => '08133322244',
//             'role' => 'Kaprodi',
//             'user_id' => 3, 
// >>>>>>> 33a27dcd66585e57fb78b51b41d547c9d173bf6f
//         ]);

        // Dosen::create([
        //     'nip' => '197108111997021004',
        //     'nama_dosen' => 'Dr. Aris Sugiharto, S.Si., M.Kom.',
        //     'alamat_dosen' => 'Jl. Merdeka No. 10, Semarang',
        //     'no_telepon_dosen' => '081234567890',
        //     'email_dosen' => 'arissugiharto@lecturer.undip.ac.id',
        //     'role' => 'Dekan',
        //     'user_id' => 1, 
        // ]);
        }
}
