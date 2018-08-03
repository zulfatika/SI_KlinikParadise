<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    protected $table = "resep_obat";

    protected $fillable = ['jml_obat','aturan_pakai','keterangan', 'id_obat', 'id_rm'];

    public function rekamMedis(){
        return $this->belongsTo('App\RekamMedis','id_rm', 'id_rm');
    }
    public function obat(){
        return $this->belongsTo('App\Obat','id_obat', 'id_obat');
    }
}
