<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tanggal');
            $table->string('kelas');
            $table->string('jam_ke');
            $table->string('jenis_izin');
            $table->string('ruang');
            $table->text('petunjuk_tugas')->nullable();
            $table->string('petunjuk_tugas_file')->nullable();
            $table->string('surat_izin')->nullable();
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
        Schema::dropIfExists('izin_guru');
    }
}
