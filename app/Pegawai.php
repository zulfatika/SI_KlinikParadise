<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";

    protected $fillable = [
        'id_user', 'alamat','jenis_kelamin','no_telp'];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
