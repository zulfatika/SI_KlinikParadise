<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = "jadwal_praktek";

    protected $fillable = ['shift_praktek','hari_praktek','jam_praktek'];

    public function dokter()
    {
        return $this->hasMany('App\Dokter', 'id_dokter');
    }
}
