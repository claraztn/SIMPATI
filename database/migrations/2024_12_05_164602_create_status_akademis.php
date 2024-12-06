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
        Schema::create('status_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->integer('current_semester');
            $table->double('ipk_komulatif');
            $table->integer('SKSk');
            $table->enum('status_kontrak_irs', ['not_submitted', 'submitted', 'approved', 'rejected'])->default('not_submitted');
            $table->integer('batas_sks');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_akademik_mahasiswas');
    }
};