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

Route::get('/hasilrm', function(){
    return view('pegawai.index_hasilrm');
})->name('hasilrm');

Route::get('/hasilallrm', function(){
    return view('pegawai.hasil_allrm');
})->name('hasilallrm');

Route::get('/tambahdaftar', function(){
    return view('pegawai.tambah_daftar');
})->name('tambahdaftar');

Route::resource('jadwalklinik','JadwalKlinikController');

Route::resource('antrian','AntrianController');

//Route::get('jml-antrian/{id}','HomeController@jmlAntrian')->name('jml-antrian');
//Route::get('sisa-antrian/{id}','HomeController@sisaAntrian')->name('sisa-antrian');

Route::get('next-antrian/{id}','HomeController@nextAntrian')->name('next-antrian');

Route::get('tes/{id_pasien}/{id_poli}', 'AndroidUserController@cekAntriDiPoliLain');