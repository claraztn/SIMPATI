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
        Schema::create('ketersediaan_ruangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gedung');
            $table->string('nama_ruang');
            $table->integer('kapasitas_ruang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketersediaan_ruangs');
    }
};
