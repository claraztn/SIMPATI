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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->integer('id_jadwal')->primary();
            $table->string('kode_mk', 10)->nullable()->index('kode_mk');
            $table->integer('id_ruang')->nullable()->index('id_ruang');
            $table->char('kelas', 1)->nullable();
            $table->string('hari', 10)->nullable();
            $table->time('jam_mulai')->nullable();
            $table->integer('sks')->nullable();
            $table->string('nip_dosen', 18)->nullable()->index('fk_nip_dosen_jadwal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
