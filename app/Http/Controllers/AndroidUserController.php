<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AndroidUserController extends Controller
{
    public function register(Request $request){
        $nik            = $request->nik;
        $nama_pasien    = $request->nama_pasien;
        $password       = $request->password;
        $tempat_lahir   = $request->tempat_lahir;
        $tgl_lahir      = $request->tgl_lahir;
        $alamat         = $request->alamat;
        $no_telp        = $request->no_telp;
        $jenis_kelamin  = $request->jenis_kelamin;
        $riwayat_alergi = $request->riwayat_alergi;

        $user = DB::table('pasien')
            ->insert([
                "no_kartu" => date("YmdHis"),
                "nik"            => $nik,
                "nama_pasien"    => $nama_pasien,
                "password"       => Hash::make($password),
                "tempat_lahir"   => $tempat_lahir,
                "tgl_lahir"      => $tgl_lahir,
                "alamat"         => $alamat,
                "no_telp"        => $no_telp,
                "jenis_kelamin"  => $jenis_kelamin,
                "riwayat_alergi" => $riwayat_alergi
            ]);

        if($user){
            return response()->json([
                "status" => 'OK'
            ]);  

        }else{
            return response()->json([
                "status" => 'ERROR'
            ]);            
        }
    }

    public function tambahAntrian(Request $request){
        $nik            = $request->nik;
        $nama_pasien    = $request->nama_pasien;
        $password       = $request->password;
        $tempat_lahir   = $request->tempat_lahir;
        $tgl_lahir      = $request->tgl_lahir;
        $alamat         = $request->alamat;
        $no_telp        = $request->no_telp;
        $jenis_kelamin  = $request->jenis_kelamin;
        $riwayat_alergi = $request->riwayat_alergi;

        $user = DB::table('pasien')
            ->insert([
                "no_kartu" => date("YmdHis"),
                "nik"            => $nik,
                "nama_pasien"    => $nama_pasien,
                "password"       => Hash::make($password),
                "tempat_lahir"   => $tempat_lahir,
                "tgl_lahir"      => $tgl_lahir,
                "alamat"         => $alamat,
                "no_telp"        => $no_telp,
                "jenis_kelamin"  => $jenis_kelamin,
                "riwayat_alergi" => $riwayat_alergi
            ]);
        if($user){
            return response()->json([
                "status" => 'OK'
            ]);
        }else{
            return response()->json([
                "status" => 'ERROR'
            ]);
        }
    }

    public function login(Request $request){
        $nik = $request->nik;
        $password = $request->password;
        $user = DB::table('pasien')
            ->where('nik', '=', $nik)
//            ->select("nama_pasien", "no_kartu", "password")
            ->first();

        if (Hash::check($password, $user->password))
        return response()->json($user);
    }

    public function getPoli(){
//        $nik = $request->nik;
//        $password = $request->password;
        $data = DB::table('poli')
//            ->where('nik', '=', $nik)
               ->select()
               ->get();
//            ->first();

        if (sizeof($data)){
            return response()->json([
                'status' => 'OK',
                'data'   => $data,
            ]);
        }else{
            return response()->json([
                'status' => 'ERROR',
            ]);
        }
    }

    public function getJadwal(){
//        $nik = $request->nik;
//        $password = $request->password;
        $data = DB::table('jadwal_praktek')
//            ->where('nik', '=', $nik)
            ->select()
            ->get();
//            ->first();

        if (sizeof($data)){
            return response()->json([
                'status' => 'OK',
                'data'   => $data,
            ]);
        }else{
            return response()->json([
                'status' => 'ERROR',
            ]);
        }
    }

    public function tambahAntrianBaru(Request $request){
        $idPasien = $request->idPasien;
        $tanggalPeriksa = $request->tanggalPeriksa;
        $idPoli = $request->idPoli;
        $statusCheck = 0;

        $data = DB::table('antrian')->select()->where('tgl_periksa', 'like', $tanggalPeriksa)->get();
        if (sizeof($data)) {
            $urutan = sizeof($data) + 1;
        }else {
            $urutan = 1;
        }

        $user = DB::table('antrian')
            ->insert([
                "tgl_periksa"       => $tanggalPeriksa,
                "urutan_antrian"    => $urutan,
                "status_cek"        => $statusCheck,
                "id_pasien"         => $idPasien,
                "id_poli"           => $idPoli
            ]);
        if($user){
            return response()->json([
                $user
            ]);
        }else{
            return response()->json([
                "status" => 'ERROR'
            ]);
        }
    }
}
