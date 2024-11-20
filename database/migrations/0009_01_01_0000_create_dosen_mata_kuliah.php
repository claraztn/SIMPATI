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
        Schema::create('dosen_mata_kuliah', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip');
            $table->string('kode_mk');
            $table->string('tahun');
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('dosen'); 
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_mata_kuliah');
    }
};
