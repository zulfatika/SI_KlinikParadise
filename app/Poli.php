<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = "poli";

    protected $fillable = ['nama_poli','keterangan'];

    public function dokter()
    {
        return $this->hasMany('App\Dokter', 'id_dokter');
    }
}
