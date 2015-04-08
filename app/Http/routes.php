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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
