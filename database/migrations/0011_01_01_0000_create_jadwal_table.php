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
            $table->unsignedBigInteger('id_kelas');
            $table->time('jam_mulai');
            $table->integer('sks');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangan')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
