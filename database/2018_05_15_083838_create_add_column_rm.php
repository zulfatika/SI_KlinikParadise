<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddColumnRm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('rm_pemeriksaan', function($table) {
            $table->integer('id_pasien')->after('id_dokter')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->integer('id_pegawai')->after('id_pasien')->unsigned();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('rm_pemeriksaan', function($table) {
            $table->dropColumn('id_pasien');
            $table->dropColumn('id_pegawai');
        });
    }
}
