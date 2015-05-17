<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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


Route::get("/loginPemohon","LoginController@loginPemohon");
Route::get("/loginAdmin","AdminController@index");
/* END OF TESTING */
/* END OF TESTING */

Route::get('/',function(){
    $vars = Request::all();
    if(isset($vars['code'])){
       //  return $vars['code'];
       LoginController::getAccessToken($vars['code']);
        return view('commonusers.app');
        //seharusnya ke home user?
    }
    else{
        // return "hahaha gagal mampus lu";
        return view('commonusers.app');
    }
});

Route::get('home', 'HomeController@index');

Route::group(array('middleware' => 'adminAuth'),function() 
{
    //middleware adminAuth dipake buat mastiin yang bisa ngakses halaman di bawah ini yang udah login sebagai admin, adminnya gak usah pake database dulu aja ya haha
    Route::group(['prefix' => '/admin'],function(){
       Route::get('/', 'AdminController@after_index');
       Route::get('/logout', 'AdminController@logout');
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
            Route::get('/', 'TataruangController@admin_index');
            Route::get('/tambah','Tataruangcontroller@create');
            Route::post('/tambah','Tataruangcontroller@store');
            Route::get('/{id}', 'TataruangController@getFungsiRuangAdmin');
            Route::get('/sunting/{id}', 'TataruangController@edit');
            Route::post('/sunting', 'TataruangController@update');
        }); 
    });
  
});

Route::group(['prefix' => '/api'], function()
{
    Route::post('/lokasi', 'LokasiController@api');
    Route::post('/imb', 'BangunanController@api');
    Route::post('/lahan', 'LokasiController@api_lahan');
    Route::post('/lahan_id', 'LokasiController@api_lahan_id');  
});

Route::get('/informasi','InformasiController@index');
Route::get('/informasi/{id}','InformasiController@index');

Route::group(['middleware'=>'userAuth'],function(){
    //middleware userAuth digunakan untuk memastikan user harus login dulu
    Route::group(['prefix'=>'/user'],function(){
        Route::get('/pengajuan-lokasi', 'LokasiController@user_index');
        Route::post('/pengajuan-lokasi', 'LokasiController@store');
        Route::get('/pengajuan-IMB', 'BangunanController@user_index');
        Route::post('/pengajuan-IMB', 'BangunanController@store');
        Route::get('/pengaduan', 'PengaduanController@create');
        Route::post('/pengaduan', 'PengaduanController@store');
        Route::get('/tataruang', 'TataruangController@index');
        Route::get('/tataruang/{id}', 'TataruangController@getFungsiRuang');
        Route::get('/logout','LoginController@logout');    
    });
});

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
