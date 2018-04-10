<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeriksaanlabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaanlab', function (Blueprint $table) {
            $table->increments('id_ceklab');
            $table->string('hasil_kadar','50');
            $table->text('keterangan');
            $table->integer('id_jeniskadar')->unsigned();
            $table->foreign('id_jeniskadar')->references('id_jeniskadar')->on('jenispemeriksaanlab');
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
        Schema::dropIfExists('pemeriksaanlab');
    }
}
