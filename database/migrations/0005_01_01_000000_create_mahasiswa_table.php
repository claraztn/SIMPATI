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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama_mahasiswa');
            $table->text('alamat_mahasiswa');
            $table->string('no_telepon_mahasiswa');
            $table->string('email_mahasiswa')->unique('email_mahasiswa');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('status', ['Aktif', 'Non Aktif', 'Cuti','Lulus']);
            $table->integer('angkatan');
            $table->string('dosen_wali');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prodi_id');
        
            $table->foreign('dosen_wali')->references('nip')->on('dosen');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prodi_id')->references('id')->on('program_studi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropForeign(['dosen_wali']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['prodi_id']);
        });
        
        Schema::dropIfExists('mahasiswa');
    }
};
