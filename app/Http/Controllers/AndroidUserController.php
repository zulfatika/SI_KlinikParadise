<?php

namespace App\Http\Controllers;

use App\Pasien;
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

        $user = new Pasien();
        $user->no_kartu       = 0;
        $user->nik            = $nik;
        $user->nama_pasien    = $nama_pasien;
        $user->password       = Hash::make($password);
        $user->tempat_lahir   = $tempat_lahir;
        $user->tgl_lahir      = $tgl_lahir;
        $user->alamat         = $alamat;
        $user->no_telp        = $no_telp;
        $user->jenis_kelamin  = $jenis_kelamin;
        $user->riwayat_alergi = $riwayat_alergi;
        $user->save();

        $data = Pasien::orderBy('id_pasien', 'DESC')->first();
        $nomor = sprintf("%06s", $data->id_pasien);

        $pasien = DB::table('pasien')
            ->where('id_pasien', $data->id_pasien)
            ->update([
                "no_kartu"    => $nomor,
            ]);

        if($user){
            return response()->json([
                "status" => 'OK',
                "data" => $pasien
            ]);
        }else{
            return response()->json([
                "status" => 'ERROR'
            ]);
        }
    }

    //tambahregisterpasien
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
        $token = $request->token;

        $user = DB::table('pasien')
            ->where('nik', '=', $nik)
//            ->select("nama_pasien", "no_kartu", "password")
            ->first();

        if (Hash::check($password, $user->password)){
            $id_pasien = $user->id_pasien;
            $update_token = DB::table('pasien')
            ->where('id_pasien', $id_pasien)
            ->update([
                "token"    => $token
            ]);
            if ($update_token){
                return response()->json($user);
            }else {
                return response()->json($user);
            }
        }else {
            return response()->json([
                "status" => false,
                "message" => "NIK dan password tidak cocok"
            ]);
        }
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
        $selected = array();

        date_default_timezone_set("Asia/Jakarta");
        $hours = date("H:i:s");
        $data = DB::table('jadwal_klinik')
            ->select()
            ->get();
//            ->first();

        foreach ($data as $time) {
            if ($time->jam_buka <= $hours && $hours <= $time->jam_tutup) {
                $selected[] = $time;
            }
        }

        if (sizeof($selected)){
            return response()->json([
                'status' => true,
                'time' => $hours,
                'data'   => $selected,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'time' => $hours,
                'message' => "Klinik sedang tutup"
            ]);
        }
    }

    public function statusAntrian(){
        $data = DB::table('status_antrian')->first();
        if(sizeof($data)==0){
            return self::KLINIK_TUTUP;
        }
        return $data->status_cek;
    }

//    public function statusAntarObat(){
//        $data = DB::table('status_kirim_obat')->first();
//        if(sizeof($data)==0){
//            return self::KLINIK_TUTUP;
//        }
//        return $data->status_obat;
//    }

    public function cekAntriDiPoliLain($id_pasien, $id_poli){
        $data = DB::table('antrian')
            ->select('id_pasien')
            ->where('id_poli', '<>', $id_poli)
            ->where('id_pasien', '=', $id_pasien)
            ->where('status_cek', '<>', 2)
            ->get();
        $hitung = count($data);
        if($hitung == 0){
            return false;
        }else {
            return true;
        }
    }

    public function tambahAntrianBaru(Request $request){
        // $status_antrian = DB::table('status_antrian')->select('status_cek')->orderByDesc('status_cek')->get();
        $idPasien = $request->idPasien;
        $tanggalPeriksa = $request->tanggalPeriksa;
        $idPoli = $request->idPoli;
        $idJadwal = $request->idJadwal;
        $statusCheck = 0;
        if ($this->statusAntrian() == self::KLINIK_TUTUP){
            return response()->json([
                "status" => false,
                "message" => 'Antrian Sudah Ditutup'
            ]);
        }
        elseif($this->cekAntriDiPoliLain($idPasien, $idPoli)){
            return response()->json([
                "status" => false,
                "message" => 'Anda harus selesaikan antrian yang ada dulu'
            ]);
        }
        else{
            $last_antrian = DB::table('antrian')->select('id_poli')->where('id_poli', $idPoli)->get();
            $jml = count($last_antrian);
            $urutan = $jml + 1;
            $cek = DB::table('antrian')->select('id_pasien')
                ->where('id_pasien', $idPasien)
                ->where('id_poli', $idPoli)
                ->get();
            $jumlahdata = count($cek);
            if($jumlahdata != 0){
                return response()->json([
                    "status" => false,
                    "message" => 'Anda telah mengantri untuk poli ini'
                ]);
            }
            else{
                $user = DB::table('antrian')->insert([
                    "tgl_periksa"       => $tanggalPeriksa,
                    "urutan_antrian"    => $urutan,
                    "status_cek"        => $statusCheck,
                    "id_pasien"         => $idPasien,
                    "id_poli"           => $idPoli,
                    "id_jadwalklinik"   => $idJadwal
                ]);
                if ($user) {
                    return response()->json([
                        "status" => true,
                        "message" => 'Anda berhasil melakukan pemesanan'
                    ]);
                }else {
                    return response()->json([
                        "status" => false,
                        "message" => 'Anda telah mengantri untuk poli ini'
                    ]);
                }

            }
        }
        /*$user = DB::table('antrian')
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
        }*/
    }

    public function profile(Request $request){
        $idProfile = $request->idProfile;
        $user = DB::table('pasien')->where('id_pasien', $idProfile);

        if(sizeof($user->get())){
            return response()->json([
                "status" => true,
                "data" => $user->get()
            ]);
        }else{
            return response()->json([
                "status" => false,
                "message" => "User tidak ditemukan"
            ]);
        }
    }

    public function getHistoryAntrian(Request $request){
        $id_user = $request->idPasien;
        $detail = DB::table('antrian')
            ->join('poli', 'poli.id_poli', '=', 'antrian.id_poli')
            ->join('jadwal_klinik', 'jadwal_klinik.id_jadwalklinik', '=', 'antrian.id_jadwalklinik')
            ->where('antrian.id_pasien', $id_user); 
        if ($detail) {
            return response()->json([
                "status" => true,
                "data" => $detail->get(),
            ]);
        }else {
            return response()->json([
                "status" => false,
                "message" => "Data not found",
            ]);
        }
    }

    public function detailAntrian(Request $request){
        $id_user = $request->idPasien;
        $detail = DB::table('antrian')
            ->join('poli', 'poli.id_poli', '=', 'antrian.id_poli')
            ->join('jadwal_klinik', 'jadwal_klinik.id_jadwalklinik', '=', 'antrian.id_jadwalklinik')
            ->join('pasien', 'pasien.id_pasien', '=', 'antrian.id_pasien')
            ->orderBy('antrian.id_antrian', 'desc')
            ->where('antrian.id_pasien', $id_user)->first();

        $detailUmum = DB::table('antrian')
            ->where('id_poli', 1)
            ->where('status_cek', 1)
            ->first();

        $detailGigi = DB::table('antrian')
            ->where('id_poli', 2)
            ->where('status_cek', 1)
            ->first();

        $detailKecantikan = DB::table('antrian')
            ->where('id_poli', 3)
            ->where('status_cek', 1)
            ->first();

        if ($detail) {
            return response()->json([
                "status" => true,
                "data" => $detail,
                "umum" => $detailUmum,
                "gigi" => $detailGigi,
                "kecantikan" => $detailKecantikan,
            ]);
        }else {
            return response()->json([
                "status" => true,
                "data" => null,
                "umum" => $detailUmum,
                "gigi" => $detailGigi,
                "kecantikan" => $detailKecantikan,
            ]);
        }
    }

    public function buktiAntrian (Request $request){
        $id_antrian = $request->idAntrian;

        $antrian = DB::table('antrian')
            ->join('poli', 'poli.id_poli', '=', 'antrian.id_poli')
            ->join('jadwal_klinik', 'jadwal_klinik.id_jadwalklinik', '=', 'antrian.id_jadwalklinik')
            ->join('pasien', 'pasien.id_pasien', '=', 'antrian.id_pasien')
            ->where('antrian.id_antrian', $id_antrian)
            ->first();

        if (sizeof($antrian)){
            return response()->json([
                "status" => true,
                "data" => $antrian
            ]);
        }else{
            return response()->json([
                "status" => true,
                "message" => "antrian tidak ditemukan"
            ]);
        }
    }


    public function antiranAfterAdd (Request $request){
        $idPasien = $request->idPasien;

        $detail = DB::table('antrian')
            ->join('poli', 'poli.id_poli', '=', 'antrian.id_poli')
            ->join('jadwal_klinik', 'jadwal_klinik.id_jadwalklinik', '=', 'antrian.id_jadwalklinik')
            ->join('pasien', 'pasien.id_pasien', '=', 'antrian.id_pasien')
            ->orderBy('antrian.id_antrian', 'desc')
            ->where('antrian.id_pasien', $idPasien)->first();

        if (sizeof($detail)){
            return response()->json([
                "status" => true,
                "data" => $detail
            ]);
        }else{
            return response()->json([
                "status" => true,
                "message" => "antrian tidak ditemukan"
            ]);
        }
    }

    public function updateProfile(Request $request){
        $idProfile      = $request->idProfile;
        $nama_pasien    = $request->nama_pasien;
        $tempat_lahir   = $request->tempat_lahir;
        $tgl_lahir      = $request->tgl_lahir;
        $alamat         = $request->alamat;
        $no_telp        = $request->no_telp;
        $jenis_kelamin  = $request->jenis_kelamin;
        $riwayat_alergi = $request->riwayat_alergi;

        $user = DB::table('pasien')
            ->where('id_pasien', $idProfile)
            ->update([
                "nama_pasien"    => $nama_pasien,
                "tempat_lahir"   => $tempat_lahir,
                "tgl_lahir"      => $tgl_lahir,
                "alamat"         => $alamat,
                "no_telp"        => $no_telp,
                "jenis_kelamin"  => $jenis_kelamin,
                "riwayat_alergi" => $riwayat_alergi
            ]);

        if($user){
            return response()->json([
                "status" => true,
                "message" => "Update profile berhasil"
            ]);
        }else{
            return response()->json([
                "status" => false,
                "message" => "Update tidak berhasil"
            ]);
        }
    }

    public function deleteAntrian(Request $request){
        $idAntrian      = $request->idAntrian;
        $antrian = DB::table('pasien')
            ->where('id_antrian', $idAntrian)
            ->delete();

        if($antrian){
            return response()->json([
                "status" => true,
                "message" => "Batalkan antrian berhasil"
            ]);
        }else{
            return response()->json([
                "status" => false,
                "message" => "Batalkna pemesanan tidak berhasil"
            ]);
        }
    }

    // public function destroy(Request $request)
    // {
    //     DB::table('antrian')->where('id_antrian', '=', $request->id_antrian)->delete();

    //     return back();
    // }
}