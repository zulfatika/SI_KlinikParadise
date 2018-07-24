<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    protected $table = "resep_obat";

    protected $fillable = ['jml_obat','aturan_pakai','keterangan', 'id_obat', 'id_rm'];

}
