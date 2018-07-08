<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = "antrian";
    protected $fillable = ['tgl_periksa','urutan_antrian','status_cek','id_pasien','id_poli'];
    public $timestamps = ['updated_at','created_at'];

    public function poli(){
        return $this->belongsTo('App/Poli','id_poli', 'id_poli');
    }
    public function pasien(){
        return $this->belongsTo('App/Pasien','id_pasien', 'id_pasien');
    }
    public function sum($poli){
        return Antrian::all()->where('id_poli','=',$poli)->where('tgl_periksa','=',date('Y-m-d'))->count();
    }

}
