<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim', 14)->primary();
            $table->string('nama_mahasiswa', 50);
            $table->text('alamat_mahasiswa');
            $table->string('no_telepon_mahasiswa', 15);
            $table->string('email_mahasiswa', 100)->unique('email_mahasiswa');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->integer('angkatan');
            $table->integer('program_studi_id')->index('fk_mahasiswa_prodi');
            $table->string('nip_dosen', 18)->nullable()->index('nip_dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
