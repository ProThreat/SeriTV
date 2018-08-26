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

Route::get('/', 'HomeController@index');
//Login routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

/** Front end**/
Route::get('/seri', 'SeriController@index'); /*->middleware('CheckRole:editor')*/
Route::get('/seri/{$seri}', function () {
    return view('seri.item');
});

/** Back end **/
//Seri
Route::get('/admin/seri/', 'SeriController@index_admin');
Route::get('/admin/seri/create', 'SeriController@create');
Route::post('/admin/seri/create', 'SeriController@store');
Route::get('/admin/seri/ajax', 'SeriController@ajax');
Route::post('/admin/seri/ajax', 'SeriController@postAjax');
//Seri Genre
Route::get('/admin/seri/genre', 'SeriGenreController@index');
Route::post('/admin/seri/genre', 'SeriGenreController@store');
//Seri Type
Route::get('/admin/seri/type', 'SeriTypeController@index');
Route::post('/admin/seri/type', 'SeriTypeController@store');
