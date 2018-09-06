<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusAntarObat extends Model
{
    protected $table = 'status_kirim_obat';
    protected $fillable = ['status_obat'];
	public $timestamps = false;
}
