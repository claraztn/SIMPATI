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
        Schema::create('IRS', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('semester')->nullable();
            $table->integer('jmlsks')->nullable();
            $table->string('scansks')->nullable();
            $table->boolean('isverified')->default(false);
            $table->unsignedBigInteger('id_kelas');
            $table->timestamps();

            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('IRS', function (Blueprint $table) {
            if (Schema::hasColumn('IRS', 'nim')) {
                $table->dropForeign(['nim']);
            }
            if (Schema::hasColumn('IRS', 'id_kelas')) {
                $table->dropForeign(['id_kelas']);
            }
        });

        Schema::dropIfExists('IRS');
    }
};
