<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run()
    {
        // Dosen sebagai Dekan
        Dosen::create([
            'nip' => '12345678',
            'nama_dosen' => 'Dr. Ali Dekan',
            'email_dosen' => 'dekan@example.com',
            'alamat_dosen' => 'Jl. Teknik No. 1',
            'no_telepon_dosen' => '08123456789',
            'role' => 'Dekan',
            'user_id' => 1, 
        ]);

        // Dosen sebagai Dosen Wali
        Dosen::create([
            'nip' => '87654321',
            'nama_dosen' => 'Dr. Budi Dosen Wali',
            'email_dosen' => 'dosenwali@example.com',
            'alamat_dosen' => 'Jl. Ilmu No. 2',
            'no_telepon_dosen' => '08198765432',
            'role' => 'PembimbingAkademik',
            'user_id' => 2,
        ]);

        // Dosen sebagai Kaprodi
        Dosen::create([
            'nip' => '11223344',
            'nama_dosen' => 'Dr. Citra Kaprodi',
            'email_dosen' => 'kaprodi@example.com',
            'alamat_dosen' => 'Jl. Prodi No. 3',
            'no_telepon_dosen' => '08133322244',
            'role' => 'Kaprodi',
            'user_id' => 3, 
        ]);

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
