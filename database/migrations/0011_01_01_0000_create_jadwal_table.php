<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('hari');
            $table->unsignedBigInteger('id_ruang');
            $table->string('kode_kelas');
            $table->time('jam_mulai');
            $table->integer('sks');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangan')->onDelete('cascade');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
