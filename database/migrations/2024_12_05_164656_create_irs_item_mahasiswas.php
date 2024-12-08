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
        Schema::create('irs_item_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_irs');
            $table->unsignedBigInteger('id_jadwal'); //added
            $table->string('nim');
            $table->string('kode_mk');

            $table->string('hari');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('ruang');

            $table->foreign('id_irs')->references('id')->on('irs')->onDelete('cascade');

            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade'); //added

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs_item_mahasiswas');
    }
};