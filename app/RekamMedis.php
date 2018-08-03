<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = "rm_pemeriksaan";

    protected $fillable = [
        'id_rm','keluhan','diagnosa','id_dokter','id_pasien'
    ];

    public function pasien(){
        return $this->belongsTo('App\Pasien','id_pasien', 'id_pasien');
    }

    public function dokter(){
        return $this->belongsTo('App\Dokter','id_dokter', 'id_dokter');
    }

    public function resepObat(){
        return $this->hasMany('App\ResepObat','id_rm', 'id_rm');
    }
}
