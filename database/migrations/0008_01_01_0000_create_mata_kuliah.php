<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('kode_mk')->primary();
            $table->string('nama_mk');
            $table->integer('semester');
            $table->integer('sks');
            $table->enum('sifat', ['Wajib', 'Pilihan']);
            $table->string('id_prodi');
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
