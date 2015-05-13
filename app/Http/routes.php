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

Route::get('/',function(){
    $var = Request::all();
    if(isset($var['code'])){
        setcookie("access_token",$var['code'],time()+60*60);
        return "yes";
    }
    else{
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        // return "hahaha gagal mampus lu";
        return view('commonusers.app');
=======
        return "hahaha gagal mampus lu";
>>>>>>> Stashed changes
=======
        return "hahaha gagal mampus lu";
>>>>>>> Stashed changes
    }
});

Route::get('home', 'HomeController@index');

Route::group(['prefix' => '/admin'], function()
{
   Route::get('/', 'AdminController@index');
   Route::get('/pengaduan/{jenis}', 'PengaduanController@index');
   Route:: get('/tataruang', 'TataruangController@admin_index');

   Route::group(['prefix' => '/informasi'], function()
    {
        Route::get('/', 'InformasiController@admin_index');
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
    Route::group(['prefix' => '/tataruang'], function()
    {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        Route::get('/', 'TataruangController@admin_index');
        Route::get('/tambah','Tataruangcontroller@create');
        Route::post('/tambah','Tataruangcontroller@store');
        Route::get('/{id}', 'TataruangController@getFungsiRuang');
        Route::get('/sunting/{id}', 'TataruangController@edit');
        Route::post('/sunting', 'TataruangController@update');
=======
        Route::get('/tambah','Tataruangcontroller@create');
>>>>>>> Stashed changes
=======
        Route::get('/tambah','Tataruangcontroller@create');
>>>>>>> Stashed changes
    }); 
});

Route::group(['prefix' => '/api'], function()
{
    Route::post('/lokasi', 'LokasiController@api');
    Route::post('/imb', 'BangunanController@api');
    Route::post('/lahan', 'LokasiController@api_lahan');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======

>>>>>>> Stashed changes


>>>>>>> Stashed changes
});

Route::get('/informasi','InformasiController@index');
Route::get('/informasi/{id}','InformasiController@index');
Route::get('/pengajuan-lokasi', 'LokasiController@user_index');
Route::post('/pengajuan-lokasi', 'LokasiController@store');
Route::get('/pengajuan-IMB', 'BangunanController@user_index');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
Route::post('/pengajuan-IMB', 'BangunanController@store');
=======
Route::get('/pengajuan-IMB', 'BangunanController@store');
>>>>>>> Stashed changes
=======
Route::get('/pengajuan-IMB', 'BangunanController@store');
>>>>>>> Stashed changes
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
