<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandarCekLab extends Model
{
    protected $table = "jenispemeriksaanlab";

    protected $fillable = [
        'nama_kadar', 'standart_kadar', 'satuan_kadar'];
}
