<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CekFisik extends Model
{
    protected $table = "cekfisik";

    protected $fillable = [
        'tek_darah', 'nadi', 'rr', 'suhu', 'spo2', 'berat_bdn', 'tinggi_bdn', 'id_pasien'];
}
