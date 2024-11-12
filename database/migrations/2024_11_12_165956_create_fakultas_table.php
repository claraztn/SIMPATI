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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->integer('id_fakultas')->primary();
            $table->string('nama_fakultas', 50);
            $table->string('no_telepon_fakultas', 15)->nullable();
            $table->string('email_fakultas', 30)->nullable()->unique('email_fakultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};
