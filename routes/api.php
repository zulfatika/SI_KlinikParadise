<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', 'UsersController@users');
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('pasien/register', 'AndroidUserController@register');

Route::post('pasien/login', 'AndroidUserController@login');
Route::get('getPoli', 'AndroidUserController@getPoli');
Route::get('jadwal', 'AndroidUserController@getJadwal');
Route::post('tambahAntrian', 'AndroidUserController@tambahAntrianBaru');
Route::post('profile', 'AndroidUserController@profile');
Route::post('updateProfile', 'AndroidUserController@updateProfile');
Route::post('history', 'AndroidUserController@getHistoryAntrian');
Route::post('detailAntrian', 'AndroidUserController@detailAntrian');
