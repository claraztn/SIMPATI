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
            $table->string('nama_ruang', 4);
            $table->char('gedung', 1);
            $table->integer('kapasitas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruangan');
    }
}

