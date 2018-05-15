<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('sip_dokter', '100')->unique();
            $table->string('token', '200')->nullable();
            $table->text('alamat');
            $table->string('jenis_kelamin', '1');
            $table->string('no_telp','20');
            $table->integer('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('poli');
            $table->integer('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal_praktek');
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
        Schema::dropIfExists('admin');
    }
}
