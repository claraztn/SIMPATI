<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khs', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('semester');
            $table->string('kode_mk');
            $table->string('tahun');
            $table->integer('skssemester');
            $table->integer('skskumulatif');
            $table->float('ipsemester');
            $table->float('ipkumulatif');
            $table->string('scankhs')->nullable();
            $table->boolean('isverified')->default(false);
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('khs', function (Blueprint $table) {
            // Hapus foreign key sebelum menghapus tabel
            $table->dropForeign(['nim']); // Nama kolom foreign key
            $table->dropForeign(['kode_mk']); // Nama kolom foreign key
        });

        // Hapus tabel
        Schema::dropIfExists('khs');
    }
};
