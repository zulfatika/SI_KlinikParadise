<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResepRacikan extends Model
{
    protected $table = "resep_racikan";

    protected $fillable = ['jml_obat','satuan_obat','aturan_pakai', 'urutan_racikan', 'id_obat', 'id_rm'];

}
