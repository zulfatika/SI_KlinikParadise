<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "pasien";
    protected $fillable = ['no_kartu','nik','nama_pasien','password','token','tempat_lahir','tgl_lahir','alamat','no_telp', 'jenis_kelamin','riwayat_alergi'];

    public function cekFisik(){
        return $this->hasMany('App\CekFisik','id_pasien', 'id_pasien');
    }
    public function getLast($pasien){
        return CekFisik::where("id_pasien","=",$pasien)->orderBy('updated_at')->first();
    }

}