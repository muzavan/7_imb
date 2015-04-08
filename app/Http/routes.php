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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

/* Informasi Begin */
Route::get('/informasis','InformasiController@index');
Route::get('/informasis/create','InformasiController@create');
Route::post('/informasis/create','InformasiController@store');
//Route::get('/informasis/informasi/{id}/edit','InformasiController@edit');
Route::group(['prefix' => '/informasis/informasi/{id}'], function()
{
    
    Route::get('/','InformasiController@show');
    Route::get('edit', 'InformasiController@edit');
    Route::post('update','InformasiController@update');
    Route::get('delete','InformasiController@destroy');

});

/* Informasi End */



/* Bangunan Begin */
Route::get('/bangunans','BangunanController@index');
Route::get('/bangunans/create','BangunanController@create');
Route::post('/bangunans','BangunanController@store');
Route::group(['prefix' => '/bangunans/bangunan/{id}'], function()
{
    
    Route::get('/','BangunanController@show');
    Route::get('edit', 'BangunanController@edit');
    Route::post('update','BangunanController@update');
    Route::get('delete','BangunanController@destroy');

});

/* Bangunan End */

/* Lokasi Begin */
Route::get('/lokasis','LokasiController@index');
Route::get('/lokasis/create','LokasiController@create');
Route::post('/lokasis','LokasiController@store');
Route::group(['prefix' => '/lokasis/lokasi/{id}'], function()
{
    
    Route::get('/','LokasiController@show');
    Route::get('edit', 'LokasiController@edit');
    Route::post('update','LokasiController@update');
    Route::get('delete','LokasiController@destroy');

});

/* Lokasi End */

/* Pemilik Begin */
Route::get('/pemiliks','PemilikController@index');
Route::get('/pemiliks/create','PemilikController@create');
Route::post('/pemiliks','PemilikController@store');
Route::group(['prefix' => '/pemiliks/pemilik/{id}'], function()
{
    
    Route::get('/','PemilikController@show');
    Route::get('edit', 'PemilikController@edit');
    Route::post('update','PemilikController@update');
    Route::get('delete','PemilikController@destroy');

});

/* Pemilik End */

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
