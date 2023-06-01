<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefleksiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refleksi_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_pelajaran');
            $table->string('semester');
            $table->string('nama');
            $table->string('kelas');
            $table->string('guru');
            $table->string('mata_pelajaran');
            $table->string('pertanyaan1');
            $table->string('pertanyaan2');
            $table->string('pertanyaan3');
            $table->string('pertanyaan4');
            $table->string('pertanyaan5')->nullable();
            $table->string('pertanyaan6')->nullable();
            $table->string('pertanyaan7')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refleksi_siswa');
    }
}
