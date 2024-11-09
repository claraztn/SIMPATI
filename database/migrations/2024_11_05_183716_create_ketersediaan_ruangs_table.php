<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetersediaanRuangsTable extends Migration
{
    public function up()
    {
        Schema::create('ketersediaan_ruangs', function (Blueprint $table) {
            $table->id();
            $table->string('gedung');
            $table->string('nama_ruang');
            $table->integer('kapasitas_ruang');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ketersediaan_ruangs');
    }
}

