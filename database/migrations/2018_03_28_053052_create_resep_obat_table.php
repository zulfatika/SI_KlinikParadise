<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->increments('id_resep_obat');
            $table->text('aturan_pakai');
            $table->text('keterangan');
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
        Schema::dropIfExists('resep_obat');
    }
}
