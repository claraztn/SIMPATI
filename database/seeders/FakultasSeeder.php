<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fakultas')->insert([
            [
                'id' => 1,
                'nama_fakultas' => 'Fakultas Teknik',
                'no_telepon_fakultas' => '021123456',
                'email_fakultas' => 'teknik@universitas.ac.id',
            ],
            [
                'id' => 2,
                'nama_fakultas' => 'Fakultas Ekonomi',
                'no_telepon_fakultas' => '021654321',
                'email_fakultas' => 'ekonomi@universitas.ac.id',
            ],
        ]);
    }
}
