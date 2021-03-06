<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\Poli;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    const ANTRIAN_BELUM = 0;
    const ANTRIAN_SEDANG = 1;
    const ANTRIAN_SUDAH = 2;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polis = Poli::with('antrian')->get();
//        dd($polis[0]->antrian[0]);
        $antrian_aktif_satu = DB::select(DB::raw("SELECT urutan_antrian
          FROM antrian WHERE status_cek = 1
          AND id_poli = 1
          ORDER BY urutan_antrian DESC LIMIT 1"));

        $antrian_aktif_dua = DB::select(DB::raw("SELECT urutan_antrian
          FROM antrian WHERE status_cek = 1
          AND id_poli = 2
          ORDER BY urutan_antrian DESC LIMIT 1"));

        $antrian_aktif_tiga = DB::select(DB::raw("SELECT urutan_antrian
          FROM antrian WHERE status_cek = 1
          AND id_poli = 3
          ORDER BY urutan_antrian DESC LIMIT 1"));

        if(!empty($antrian_aktif_satu))
            $umum = $antrian_aktif_satu[0]->urutan_antrian;
        else $umum = 0;

        if(!empty($antrian_aktif_dua))
            $gigi = $antrian_aktif_dua[0]->urutan_antrian;
        else $gigi = 0;

        if(!empty($antrian_aktif_tiga))
            $cantik = $antrian_aktif_tiga[0]->urutan_antrian;
        else $cantik = 0;

        $antrian_aktif = array();
        array_push($antrian_aktif,  [
            'umum' => $umum,
            'gigi' => $gigi,
            'cantik' => $cantik
        ]);

        $jml_antrian_umum = $this->jmlAntrian(1);
        $jml_antrian_gigi = $this->jmlAntrian(2);
        $jml_antrian_cantik = $this->jmlAntrian(3);

        $sisa_antrian_umum = $this->sisaAntrian(1);
        $sisa_antrian_gigi = $this->sisaAntrian(2);
        $sisa_antrian_cantik = $this->sisaAntrian(3);
//        dd($sisa_antrian_cantik);
        $data_jml = array();
        array_push($data_jml, [
            'jml_antrian_umum' => $jml_antrian_umum,
            'jml_antrian_gigi' => $jml_antrian_gigi,
            'jml_antrian_cantik' => $jml_antrian_cantik,
            'sisa_antrian_umum' => $sisa_antrian_umum,
            'sisa_antrian_gigi' => $sisa_antrian_gigi,
            'sisa_antrian_cantik' => $sisa_antrian_cantik
        ]);
//        dd($data_jml);
        return view('/home',compact('antrian'))
            ->with('status_antrian',$this->statusAntrian())
            ->with('polis',$polis)
            ->with('antrian_aktif', $antrian_aktif)
            ->with('jml', $data_jml);
    }

    public function statusAntrian()
    {
        $data = DB::table('status_antrian')->first();
        if (sizeof($data) == 0) {
            return self::KLINIK_TUTUP;
        }
        return $data->status_cek;
    }

    public function nextAntrian($id_poli)
    {
        $check = Antrian::where('id_poli','=',$id_poli)
            ->where('status_cek','=',1)
            ->orderBy('urutan_antrian', 'desc')->first();

        if(!empty($check)){
            $ganti = DB::select(DB::raw("UPDATE antrian SET status_cek = 1
            WHERE status_cek = 0 AND id_poli = $id_poli
            ORDER BY urutan_antrian ASC LIMIT 1"));

            $ganti_lagi = DB::select(DB::raw("UPDATE antrian SET status_cek = 2
            WHERE status_cek = 1 AND id_poli = $id_poli
            ORDER BY urutan_antrian ASC LIMIT 1"));
        }
        else{
            $ganti = DB::select(DB::raw("UPDATE antrian SET status_cek = 1
            WHERE status_cek = 0 AND id_poli = $id_poli
            ORDER BY urutan_antrian ASC LIMIT 1"));
        }
        
        $this->getAntrianSekarang($id_poli);
        // $this->getAntrianNoll($id_poli);
        
        return redirect()->back();
        die();
        /*$ganti = Antrian::where('id_poli','=',$id_poli)
            ->where('tgl_periksa','=',date('2018-07-05'))
            ->where('status_cek','=',0)
            ->orderBy('urutan_antrian', 'asc')->first();
        if(!empty($check)){
            Antrian::where('id_poli','=',$id_poli)
                ->where('status_cek','=',1)
                ->update([
                    'status_cek'=>self::ANTRIAN_SUDAH
                ]);
            $nextAntrian = Antrian::where('id_poli','=',$id_poli)
                ->where('status_cek','=',0)
                ->update([
                    'status_cek'=>self::ANTRIAN_SEDANG
                ]);
//            dd($nextAntrian);
        }else{
//            $check = Antrian::where('id_poli','=',$id_poli)
//                ->where('tgl_periksa','=',date('Y-m-d'))
//                ->where('status_cek','=',1)
//                ->orderBy('urutan_antrian', 'desc')
//                >update([
//                    'status_cek'=>self::ANTRIAN_SUDAH
//                ]);
            $nextAntrian = Antrian::where('id_poli','=',$id_poli)
                ->where('status_cek','=',0)
                ->update([
                    'status_cek'=>self::ANTRIAN_SEDANG
                ]);
        }
        return redirect()->back();*/
    }

    public function getAntrianSekarang($id_poli){
        $antrian = DB::table('antrian')->where('id_poli', $id_poli)->where('status_cek', 1)->first();
        if (sizeof($antrian) != 0) {
            //antrian ada
            $id_antrian = $antrian->urutan_antrian;
            $antrian_sisa = DB::table('antrian')
                        ->join('pasien', 'pasien.id_pasien', '=', 'antrian.id_pasien')
                        ->where('antrian.id_poli', $id_poli)
                        ->where('antrian.status_cek', 0)
                        ->get();

            $antrian_now = DB::table('antrian')
                        ->join('pasien', 'pasien.id_pasien', '=', 'antrian.id_pasien')
                        ->where('antrian.id_poli', $id_poli)
                        ->where('antrian.status_cek', 1)
                        ->first();

            foreach ($antrian_sisa as $user) {
                if ($user->token!=null) {
                    $this->postNotification($user->token, $id_antrian);
                }
            }
            $this->postNotificationNow($antrian_now->token);
        }
    }

    public function getAntrianNoll($id_poli){
        $antrian = DB::table('antrian')->where('id_poli', $id_poli)->where('status_cek', 0)->first();
        if (sizeof($antrian) != 0) {
            //antrian ada
            $antrian_sisa = DB::table('antrian')
                        ->join('pasien', 'pasien.id_pasien', '=', 'antrian.id_pasien')
                        ->where('antrian.id_poli', $id_poli)
                        ->where('antrian.status_cek', 0)
                        ->get();

            foreach ($antrian_sisa as $user) {
                if ($user->token!=null) {
                    $this->postNotificationNow($user->token);
                }
            }
        }
    }

    public function postNotification($idPhone, $nomor_urut){
        //pesan yang ada pada notifikasi
        $message = "Antrian saat ini nomor ". $nomor_urut;
        //title yang ada pada notifikasi
        $title   = "Segera datang ke Klinik Paradise";
        $path    = 'https://fcm.googleapis.com/fcm/send';
        $server  = "AAAAOL4gVCg:APA91bEM6sMyfw4vIkLZc8F2Mm-jthOZrEnZvS6XtQpSDtqPvomVTQOeGQLw1gK_-k6D5ktSG9DvH7j1IwkVmJMgTDJCQaGDKcN0tGpnAGCNiXsrMTxmZ9lRqubXz_nvskyn01zbZI6fz5ixIyJ3HKKHkpPxjfAXuw";
        $headers = array(
            'Authorization:key='. $server, 
            'Content-Type:application/json');
        $msg     = array(
            'body'         => $message,
            'title'        => $title,
            'click_action' => "TARGET_NOTIF");
        $fields  = array(
            'to'           => $idPhone,
            'notification' => $msg);
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields) );
        $result = curl_exec($ch);
        curl_close($ch);
    }

    public function postNotificationNow($idPhone){
        //pesan yang ada pada notifikasi
        $message = "Sekarang giliran anda";
        //title yang ada pada notifikasi
        $title   = "Segera datang ke Klinik Paradise";
        $path    = 'https://fcm.googleapis.com/fcm/send';
        $server  = "AAAAOL4gVCg:APA91bEM6sMyfw4vIkLZc8F2Mm-jthOZrEnZvS6XtQpSDtqPvomVTQOeGQLw1gK_-k6D5ktSG9DvH7j1IwkVmJMgTDJCQaGDKcN0tGpnAGCNiXsrMTxmZ9lRqubXz_nvskyn01zbZI6fz5ixIyJ3HKKHkpPxjfAXuw";
        $headers = array(
            'Authorization:key='. $server, 
            'Content-Type:application/json');
        $msg     = array(
            'body'         => $message,
            'title'        => $title,
            'click_action' => "TARGET_NOTIF");
        $fields  = array(
            'to'           => $idPhone,
            'notification' => $msg);
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields) );
        $result = curl_exec($ch);
        curl_close($ch);
    }

    public function jmlAntrian($id_poli){
        $total_antrian = DB::table('antrian')->select('id_poli')->where('id_poli', $id_poli)->get();
        $jml = count($total_antrian);
//        $urutan = $jml + 1;
//        $cek = DB::table('antrian')->select('urutan_antrian')
//            ->where('urutan_antrian', $urutan_antrian)
//            ->where('id_poli', $id_poli)
//            ->get();
        return $jml;
    }

    public function sisaAntrian($id_poli){
//        $sisa = ($this->jmlAntrian($id_poli, $urutan_antrian))-($this->nextAntrian($id_poli));
//        $sisa = DB::table('antrian')->select('urutan_antrian')
//            ->where(['id_poli', $id_poli],
//                ['status_cek', 0]);
        $sisa = DB::select(DB::raw("SELECT urutan_antrian FROM antrian
            WHERE id_poli=$id_poli AND status_cek = 0"));

        $jml_sisa = count($sisa);
        return $jml_sisa;
    }
}