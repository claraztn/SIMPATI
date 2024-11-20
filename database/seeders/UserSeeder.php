<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data user untuk masing-masing role
        $users = [
            [
                'username' => 'dekan_user',
                'email' => 'dekan@example.com',
                'password' => Hash::make('password'),
                'role' => 'Dekan',
            ],
            [
                'username' => 'kaprodi_user',
                'email' => 'kaprodi@example.com',
                'password' => Hash::make('password'),
                'role' => 'Kaprodi',
            ],
            [
                'username' => 'dosen_wali_user',
                'email' => 'dosenwali@example.com',
                'password' => Hash::make('password'),
                'role' => 'PembimbingAkademik',
            ],
            [
                'username' => 'mahasiswa_user',
                'email' => 'mahasiswa@example.com',
                'password' => Hash::make('password'),
                'role' => 'Mahasiswa',
            ],
            [
                'username' => 'bagian_akademik_user',
                'email' => 'bagianakademik@example.com',
                'password' => Hash::make('password'),
                'role' => 'BagianAkademik',
            ],
        ];

        // Insert data ke dalam tabel users
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
