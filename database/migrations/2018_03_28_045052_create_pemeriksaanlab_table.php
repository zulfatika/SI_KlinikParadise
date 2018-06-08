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
            $table->foreign('id_jeniskadar')->references('id_jeniskadar')->on('jenispemeriksaanlab')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')
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
        Schema::dropIfExists('pemeriksaanlab');
    }
}
