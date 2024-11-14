<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuanganTable extends Migration
{
    public function up()
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id('id_ruang');
            $table->char('gedung', 1);
            $table->string('nama_ruang', 4);
            $table->integer('kapasitas')->nullable()->default(NULL);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruangan');
    }
}

