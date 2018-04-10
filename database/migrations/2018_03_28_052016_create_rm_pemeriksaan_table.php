<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRmPemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_pemeriksaan', function (Blueprint $table) {
            $table->increments('id_rm');
            $table->date('tgl_periksa');
            $table->text('keluhan');
            $table->text('diagnosa');
            $table->text('terapi');
            $table->string('status_cek','1');
            $table->integer('id_dokter')->unsigned();
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
            $table->integer('id_antrian')->unsigned();
            $table->foreign('id_antrian')->references('id_antrian')->on('antrian');
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
        Schema::dropIfExists('rm_pemeriksaan');
    }
}
