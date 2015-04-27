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

Route::get('/', function(){
    return view('commonusers.welcome');
});

Route::get('home', 'HomeController@index');

/* Informasi Begin */
Route::get('/informasis','InformasiController@demo_index');
Route::get('/informasis/create','InformasiController@create');
Route::post('/informasis/create','InformasiController@store');
Route::get('/informasis/informasi/{id}/edit','InformasiController@edit');
Route::group(['prefix' => '/informasis/informasi/{id}'], function()
{
    
    Route::get('/','InformasiController@show');
    Route::get('edit', 'InformasiController@edit');
    Route::post('update','InformasiController@update');
    Route::get('delete','InformasiController@destroy');

});

/* Informasi End */



/* Bangunan Begin */
// Route::get('/bangunans','BangunanController@index');
// Route::get('/bangunans/create','BangunanController@create');
// Route::post('/bangunans','BangunanController@store');
// Route::group(['prefix' => '/bangunans/bangunan/{id}'], function()
// {
    
//     Route::get('/','BangunanController@show');
//     Route::get('edit', 'BangunanController@edit');
//     Route::post('update','BangunanController@update');
//     Route::get('delete','BangunanController@destroy');

// });

/* Bangunan End */

/* Lokasi Begin */
// Route::get('/lokasis','LokasiController@index');
// Route::get('/lokasis/create','LokasiController@create');
// Route::post('/lokasis','LokasiController@store');
// Route::group(['prefix' => '/lokasis/lokasi/{id}'], function()
// {
    
//     Route::get('/','LokasiController@show');
//     Route::get('edit', 'LokasiController@edit');
//     Route::post('update','LokasiController@update');
//     Route::get('delete','LokasiController@destroy');

// });

// /* Lokasi End */

// /* Pemilik Begin */
// Route::get('/pemiliks','PemilikController@index');
// Route::get('/pemiliks/create','PemilikController@create');
// Route::post('/pemiliks','PemilikController@store');
// Route::group(['prefix' => '/pemiliks/pemilik/{id}'], function()
// {
    
//     Route::get('/','PemilikController@show');
//     Route::get('edit', 'PemilikController@edit');
//     Route::post('update','PemilikController@update');
//     Route::get('delete','PemilikController@destroy');

// });

// /* Pemilik End */

// /* Pemohon Begin */
// Route::get('/pemohons','PemohonController@index');
// Route::get('/pemohons/create','PemohonController@create');
// Route::post('/pemohons','PemohonController@store');
// Route::group(['prefix' => '/pemohons/pemohon/{id}'], function()
// {
    
//     Route::get('/','PemohonController@show');
//     Route::get('edit', 'PemohonController@edit');
//     Route::post('update','PemohonController@update');
//     Route::get('delete','PemohonController@destroy');

// });

// /* Pemohon End */

// /* Pengaduan Begin */
// Route::get('/pengaduans','PengaduanController@index');
// Route::get('/pengaduans/create','PengaduanController@create');
// Route::post('/pengaduans','PengaduanController@store');
// Route::group(['prefix' => '/pengaduans/pengaduan/{id}'], function()
// {
    
//     Route::get('/','PengaduanController@show');
//     Route::get('edit', 'PengaduanController@edit');
//     Route::post('update','PengaduanController@update');
//     Route::get('delete','PengaduanController@destroy');

// });

// /* Pengaduan End */

// /* Tanah Begin */
// Route::get('/tanahs','TanahController@index');
// Route::get('/tanahs/create','TanahController@create');
// Route::post('/tanahs','TanahController@store');
// Route::group(['prefix' => '/tanahs/tanah/{id}'], function()
// {
    
//     Route::get('/','TanahController@show');
//     Route::get('edit', 'TanahController@edit');
//     Route::post('update','TanahController@update');
//     Route::get('delete','TanahController@destroy');

// });

// /* Tanah End */

// /* PermohonanImb Begin */
// Route::get('/permohonanimbs','PermohonanImbController@index');
// Route::get('/pengajuan-IMB','PermohonanImbController@create');
// Route::post('/permohonanimbs','PermohonanImbController@store');
// Route::group(['prefix' => '/permohonanimbs/permohonanimb/{id}'], function()
// {
    
//     Route::get('/','PermohonanImbController@show');
//     Route::get('edit', 'PermohonanImbController@edit');
//     Route::post('update','PermohonanImbController@update');
//     Route::get('delete','PermohonanImbController@destroy');

// });

// /* PermohonanImb End */

// /* PermohonanLokasi Begin */
// Route::get('/permohonanlokasis','PermohonanLokasiController@index');
// Route::get('/pengajuan/lokasi','PermohonanLokasiController@create');
// Route::post('/permohonanlokasis','PermohonanLokasiController@store');
// Route::group(['prefix' => '/permohonanlokasis/permohonanlokasi/{id}'], function()
// {
    
//     Route::get('/','PermohonanLokasiController@show');
//     Route::get('edit', 'PermohonanLokasiController@edit');
//     Route::post('update','PermohonanLokasiController@update');
//     Route::get('delete','PermohonanLokasiController@destroy');

// });

// /* PermohonanLokasi End */

// /* Demo Begin */
// Route::group(['prefix' => '/demo'], function()
// {
//     Route::get('/','InformasiController@demo_index');
//     Route::get('/informasis/{id?}','InformasiController@demo_index');
//     Route::get('/pemohons', 'PemohonController@demo_edit');
//     Route::get('/lokasis', 'LokasiController@demo_create');
//     Route::post('/lokasis', 'LokasiController@demo_store');
//     Route::post('/pemohons/{id}', 'PemohonController@demo_update');
//     Route::get('/imbs', 'BangunanController@demo_create');
//     Route::post('/bangunans', 'BangunanController@demo_store');
//     Route::post('/pemiliks', 'PemilikController@demo_store');
//     Route::post('/tanahs', 'TanahController@demo_store');
//     Route::post('/lokasiimbs', 'LokasiController@demo_store_imbs');

//});

/* Demo End */


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

Route::get('/informasis/{id?}','InformasiController@demo_index');
Route::get('/pemohons', 'PemohonController@demo_edit');
Route::get('/pengajuan-lokasi', 'LokasiController@demo_create');
Route::get('/pengajuan-IMB', 'BangunanController@demo_create');

Route::group(['prefix' => '/izin_admin'], function()
{
    Route::get('/', 'AdminController@index');
    Route::get('/IMB', 'AdminController@IMB');
    // Route::get('lokasi', 'AdminController@lokasi');
    // Route::get('/IMB/menunggu')
});

Route::group(['prefix' => '/ruang_admin'], function()
{
    Route::get('/', 'AdminController@index_ruang');
    Route::get('/tata_ruang', 'AdminController@tata_ruang');
    // Route::get('/IMB', 'AdminController@IMB');
    // Route::get('lokasi', 'AdminController@lokasi');
    // Route::get('/IMB/menunggu')
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
