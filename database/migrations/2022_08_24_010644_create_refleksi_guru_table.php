<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefleksiGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refleksi_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('mata_pelajaran');
            $table->string('bulan');
            $table->string('kelas');
            $table->string('pertanyaan1');
            $table->string('pertanyaan2');
            $table->string('pertanyaan3');
            $table->string('pertanyaan4');
            $table->string('pertanyaan5');
            $table->string('pertanyaan6');
            $table->string('pertanyaan7');
            $table->string('pertanyaan8');
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
        Schema::dropIfExists('refleksi_guru');
    }
}
