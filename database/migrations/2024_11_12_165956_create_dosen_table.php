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
            $table->string('nip', 18)->primary();
            $table->string('nama_dosen', 50);
            $table->string('alamat_dosen', 50);
            $table->string('no_telepon_dosen', 15);
            $table->string('email_dosen', 30)->nullable()->unique('email_dosen');
            $table->char('role_code', 3)->nullable();
            $table->integer('id_prodi')->nullable()->index('fk_dosen_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
