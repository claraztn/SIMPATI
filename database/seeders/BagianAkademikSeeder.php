<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BagianAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bagian_akademik')->insert([
            'nip' => '987654321',
            'nama' => 'Beny',
            'email' => 'beny@academic.undip.ac.id',
            'handphone' => '082278438923',
            'id_user' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
