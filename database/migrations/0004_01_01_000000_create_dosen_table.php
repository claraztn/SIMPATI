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
        Schema::create('dosen', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama_dosen');
            $table->string('alamat_dosen');
            $table->string('no_telepon_dosen');
            $table->string('email_dosen')->nullable()->unique('email_dosen');
            $table->enum('role',['Dekan', 'Kaprodi', 'PembimbingAkademik']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); // Kunci asing ke kolom 'user_id' pada tabel 'users'
            $table->foreign('prodi_id')->references('id')->on('program_studi'); 
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('dosen', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('dosen');
    }
};
