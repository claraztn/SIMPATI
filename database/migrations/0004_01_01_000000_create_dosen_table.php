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
            $table->string('email')->nullable()->unique('email_dosen');
            $table->enum('role',['Dekan', 'Kaprodi' , 'PembimbingAkademik']);
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('id_prodi')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users'); 
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi'); 
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
