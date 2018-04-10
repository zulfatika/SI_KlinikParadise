<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepRacikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_racikan', function (Blueprint $table) {
            $table->increments('id_racikan');
            $table->string('jml_obat', '50');
            $table->string('satuan_obat','50');
            $table->text('aturan_pakai');
            $table->integer('urutan_racikan');
            $table->integer('id_obat')->unsigned();
            $table->foreign('id_obat')->references('id_obat')->on('obat');
            $table->integer('id_rm')->unsigned();
            $table->foreign('id_rm')->references('id_rm')->on('rm_pemeriksaan');
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
        Schema::dropIfExists('resep_racikan');
    }
}
