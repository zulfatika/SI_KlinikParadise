<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->increments('id_antrian');
            $table->date('tgl_periksa');
            $table->integer('urutan_antrian');
            $table->string('status_cek','1');
            $table->integer('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('poli')
                  ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('antrian');
    }
}
