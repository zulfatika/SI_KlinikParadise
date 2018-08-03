<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('bukaAntrian','AntrianController@bukaAntrian');

Route::get('tutupAntrian','AntrianController@tutupAntrian');

Route::resource('dokter','DokterController');

Route::resource('poli','PoliController');

Route::resource('jadwal','JadwalController');

Route::resource('pegawai','PegawaiController');

Route::resource('obat','ObatController');
Route::get('obat','ObatController@index');
Route::post('obat','ObatController@create')->name('obat:insert');
Route::post('obatstore', 'ObatController@store')->name('obat.store');

Route::resource('standarcek','PemeriksaanLabController');
Route::post('standarcek-a','PemeriksaanLabController@create')->name('input-a');

//Route::resource('rm','RMController');

Route::get('rm_pegawai/{antrian?}','RMController@indexPegawai');

Route::get('rm_dokter/{antrian?}','RMController@indexDokter');

Route::post('cek_fisik','CekFisikController@create')->name('cek_fisik:insert');

Route::post('rm','RMController@create')->name('rm:insert');

Route::get('/hasilrm/{id}','RMController@getViewHasilRm')->name('hasilrm');

Route::get('/hasilallrm', 'RMController@getViewHasil')->name('hasilallrm');

Route::get('/tambahdaftar', function(){
    return view('pegawai.tambah_daftar');
})->name('tambahdaftar');

Route::get('/grafik/{id}', function($id){
    $tinggi_badan = $berat_badan = $tekanan_darah = $nadi = $rr = $suhu_badan = $spo2 = [];
    $data = \App\CekFisik::all()->where('id_pasien','=', $id)->sortBy('created_at');

    $tanggal = array();
    foreach ($data as $val){
        $tgl = date('d-m-Y',strtotime( $val->created_at ));
        array_push($tanggal, $tgl);

        array_push($tinggi_badan, [date('d-m-Y',strtotime( $val->created_at )),$val->tinggi_bdn]);
        array_push($berat_badan, [date('d-m-Y',strtotime( $val->created_at )),$val->berat_bdn]);
        array_push($tekanan_darah, [date('d-m-Y',strtotime( $val->created_at )),$val->tek_darah]);
        array_push($nadi, [date('d-m-Y',strtotime( $val->created_at )),$val->nadi]);
        array_push($rr, [date('d-m-Y',strtotime( $val->created_at )),$val->rr]);
        array_push($suhu_badan, [date('d-m-Y',strtotime( $val->created_at )),$val->suhu]);
        array_push($spo2, [date('d-m-Y',strtotime( $val->created_at )),$val->spo2]);
    }

    return view('pegawai.grafik_cekfisik')
        ->with("tinggi_badan",$tinggi_badan)
        ->with("tanggal", json_encode($tanggal))
        ->with("berat_badan",$berat_badan)
        ->with("tekanan_darah",$tekanan_darah)
        ->with("nadi",$nadi)
        ->with("rr",$rr)
        ->with("suhu_badan",$suhu_badan)
        ->with("spo2",$spo2);

})->name('grafik');

Route::resource('jadwalklinik','JadwalKlinikController');

Route::resource('antrian','AntrianController');

//Route::get('jml-antrian/{id}','HomeController@jmlAntrian')->name('jml-antrian');
//Route::get('sisa-antrian/{id}','HomeController@sisaAntrian')->name('sisa-antrian');

Route::get('next-antrian/{id}','HomeController@nextAntrian')->name('next-antrian');

Route::get('tes/{id_pasien}/{id_poli}', 'AndroidUserController@cekAntriDiPoliLain');

Route::post('storeobat', 'ObatController@storeObat')->name('store.obat');