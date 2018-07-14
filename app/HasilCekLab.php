<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilCekLab extends Model
{
    protected $table = "pemeriksaanlab";

    protected $fillable = [
        'hasil_kadar', 'keterangan', 'id_jeniskadar', 'id_pasien'];
}
