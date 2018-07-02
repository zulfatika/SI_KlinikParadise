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

Route::resource('jadwalklinik','JadwalKlinikController');

//Route::resource('antrian','AntrianController');


