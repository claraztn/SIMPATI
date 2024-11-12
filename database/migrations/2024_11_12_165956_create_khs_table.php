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
        Schema::create('khs', function (Blueprint $table) {
            $table->integer('khs_id')->primary();
            $table->string('nim', 14)->index('nim');
            $table->integer('semester');
            $table->string('tahun_ajaran', 10);
            $table->string('kode_mk', 10)->index('kode_mk');
            $table->integer('sks');
            $table->enum('nilai', ['A', 'B', 'C', 'D', 'E']);
            $table->decimal('ips', 3)->nullable();
            $table->decimal('ipk', 3)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
