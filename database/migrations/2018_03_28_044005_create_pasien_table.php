<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->integer('no_kartu')->unique();
            $table->string('nik','20')->unique();
            $table->string('nama_pasien','100');
            $table->text('password');
            $table->string('token','200');
            $table->string('tempat_lahir','50');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('no_telp', '20');
            $table->string('jenis_kelamin','1');
            $table->text('riwayat_alergi');
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
        Schema::dropIfExists('pasien');
    }
}
