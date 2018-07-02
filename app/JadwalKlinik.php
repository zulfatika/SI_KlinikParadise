<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalKlinik extends Model
{
    protected $table = "jadwal_klinik";

    protected $fillable = ['shift_klinik','jam_buka','jam_tutup'];
}
