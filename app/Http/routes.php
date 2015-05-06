<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* TESTING SSO */

Route::get("reza/loginPemohon/code/",function(){
    echo Input::all();
});
Route::get("/loginPemohon","LoginController@loginPemohon");
/* END OF TESTING */

Route::get('/', function(){
    return view('welcome');
});

Route::get('home', 'HomeController@index');

Route::group(['prefix' => '/admin'], function()
{
   Route::get('/', 'AdminController@index');
   Route::get('/informasi', 'AdminController@index');
   Route::get('/tambah-informasi', 'InformasiController@create');
   
   Route::group(['prefix' => '/imb'], function()
    {
        Route::get('/','BangunanController@index');
        Route::get('/imb-saja', 'BangunanController@imbSatuan');
        Route::get('setuju/{id}', 'BangunanController@setuju');
        Route::post('tolak', 'BangunanController@tolak');
        Route::get('sebelumTolak/{id}', 'BangunanController@sebelumTolak');
    }); 
   Route::group(['prefix' => '/lokasi'], function()
    {
        Route::get('/','LokasiController@index');
        Route::get('setuju/{id}', 'LokasiController@setuju');
        Route::post('tolak', 'LokasiController@tolak');
        Route::get('sebelumTolak/{id}', 'LokasiController@sebelumTolak');
        Route::get('/laporan', 'LokasiController@generateLaporan'); 
    }); 
});

Route::group(['prefix' => '/home'], function()
{
    Route::get('/','InformasiController@demo_index');

    Route::get('/informasis/{id?}','InformasiController@demo_index');
    Route::get('/pengajuan-lokasi', 'LokasiController@create');
    Route::post('/pengajuan-lokasi', 'LokasiController@store');
    Route::get('/pengajuan-IMB', 'BangunanController@create');
    Route::post('/pengajuan-IMB', 'BangunanController@store');

});

Route::group(['prefix' => '/api'], function()
{
    Route::post('/lokasi', 'LokasiController@api');
    Route::post('/imb', 'BangunanController@api');

});

Route::get('/informasi/{id?}','InformasiController@demo_index');

Route::get('/pemohons', 'PemohonController@demo_edit');
Route::get('/pengajuan-lokasi', 'LokasiController@user_index');
Route::get('/pengajuan-IMB', 'BangunanController@user_index');
Route::get('/pengaduan', 'PengaduanController@index');
Route::get('/tataruang', 'TataruangController@index');
Route::get('/tataruang/{id}', 'TataruangController@getFungsiRuang');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => '/api'], function()
{
    Route::post('/lokasi', 'LokasiController@api');
    Route::post('/imb', 'BangunanController@api');

});

Route::get('/email/send','MailController@send');
Route::get('/pemohons', 'PemohonController@demo_edit');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
