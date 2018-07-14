<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = "rm_pemeriksaan";

    protected $fillable = [
        'tgl_periksa', 'keluhan','diagnosa','terapi','status_cek','id_dokter','id_pasien'];

    public function pasien(){
        return $this->belongsTo('App\Pasien','id_pasien', 'id_pasien');
    }

    public function dokter(){
        return $this->belongsTo('App\Dokter','id_dokter', 'id_dokter');
    }
}