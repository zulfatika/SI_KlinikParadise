<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemoveColumnRm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rm_pemeriksaan', function($table) {
            $table->dropForeign('rm_pemeriksaan_id_antrian_foreign');
            $table->dropColumn('id_antrian');
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
            $table->integer('id_antrian')->unsigned();
            $table->foreign('id_antrian')->references('id_antrian')->on('antrian');
        });
    }
}
