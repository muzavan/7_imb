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

Route::get('/','InformasiController@index');

Route::get('home', 'HomeController@index');

Route::group(['prefix' => '/admin'], function()
{
   Route::get('/', 'AdminController@index');
   Route::get('/pengaduan/{jenis}', 'PengaduanController@index');

   Route::group(['prefix' => '/informasi'], function()
    {
        Route::get('/informasi', 'AdminController@index');
        Route::get('/tambah', 'InformasiController@create');
        Route::post('/tambah', 'InformasiController@store');
        Route::get('/sunting/{id}','InformasiController@edit');
        Route::post('/sunting','InformasiController@update');
        Route::get('/hapus/{id}', 'InformasiController@destroy');
    });
   
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

Route::group(['prefix' => '/api'], function()
{
    Route::post('/lokasi', 'LokasiController@api');
    Route::post('/imb', 'BangunanController@api');
	Route::post('/lahan', 'LokasiController@api_lahan');
    
});

Route::get('/informasi','InformasiController@index');
Route::get('/informasi/{id}','InformasiController@index');

Route::get('/pemohons', 'PemohonController@demo_edit');
Route::get('/pengajuan-lokasi', 'LokasiController@user_index');
Route::get('/pengajuan-IMB', 'BangunanController@user_index');
Route::get('/pengaduan', 'PengaduanController@create');
Route::post('/pengaduan', 'PengaduanController@store');
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
