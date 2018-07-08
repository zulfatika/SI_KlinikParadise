<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    public function __construct(array $attributes = [])
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    protected $table = "poli";

    protected $fillable = ['nama_poli','keterangan'];

    public function dokter()
    {
        return $this->hasMany('App\Dokter', 'id_dokter');
    }

    public function antrian(){
        return $this->hasMany('App\Antrian', 'id_poli','id_poli')->where('tgl_periksa','=',date('Y-m-d'));
    }

    public function sum($poli){
        return Antrian::all()->where('id_poli','=',$poli)->count();
    }

}
