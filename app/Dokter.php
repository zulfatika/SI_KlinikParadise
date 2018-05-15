<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = "dokter";

    protected $fillable = [
        'id_user', 'sip_dokter','alamat','jenis_kelamin','no_telp','id_poli','id_jadwal'];

    public function poli()
    {
        return $this->belongsTo('App\Poli', 'id_poli', 'id_poli');
    }

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal', 'id_jadwal', 'id_jadwal');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
