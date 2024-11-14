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
        Schema::create('irs', function (Blueprint $table) {
            $table->string('irs_id', 14)->primary();
            $table->string('nim', 14)->index('nim');
            $table->integer('semester');
            $table->string('tahun_ajaran', 10);
            $table->string('kode_mk', 10)->index('kode_mk');
            $table->integer('sks');
            $table->enum('status', ['diambil', 'dibatalkan'])->nullable()->default('diambil');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs');
    }
};
