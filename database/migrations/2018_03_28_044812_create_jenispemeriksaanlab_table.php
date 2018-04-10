<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenispemeriksaanlabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenispemeriksaanlab', function (Blueprint $table) {
            $table->increments('id_jeniskadar');
            $table->string('nama_kadar','100');
            $table->string('standart_kadar','50');
            $table->string('satuan_kadar','50');
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
        Schema::dropIfExists('jenispemeriksaanlab');
    }
}
