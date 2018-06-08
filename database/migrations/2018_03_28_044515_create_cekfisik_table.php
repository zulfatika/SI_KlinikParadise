<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCekfisikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cekfisik', function (Blueprint $table) {
            $table->increments('id_fisik');
            $table->string('tek_darah', '50');
            $table->string('nadi', '50');
            $table->string('rr', '50');
            $table->string('suhu','50');
            $table->string('spo2','50');
            $table->string('berat_bdn', '20');
            $table->string('tinggi_bdn','20');
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
        Schema::dropIfExists('cekfisik');
    }
}
