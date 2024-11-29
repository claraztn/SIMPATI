<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuanganTable extends Migration
{
    public function up()
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id('id_ruang'); // Primary key
            $table->char('gedung', 5);
            $table->string('nama_ruang');
            $table->integer('kapasitas')->nullable();
            // $table->enum('status', ['pending', 'approved', 'rejected'])->nullable()->default(null);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status ruangan
            $table->string('id_fakultas')->constrained();
            $table->string('id_prodi')->constrained();

            // Foreign key constraints
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi')->onDelete('cascade');
            $table->foreign('id_fakultas')->references('id_fakultas')->on('fakultas')->onDelete('cascade');

            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::table('ruangan', function (Blueprint $table) {
            $table->dropForeign(['fakultas_id']);
            $table->dropForeign(['prodi_id']);
        });

        Schema::dropIfExists('ruangan');
    }
}
