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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::get('/films', 'SeriController@getFilms');

Route::prefix('v1')->group(function() {

    // Movies
    Route::prefix('movies')->group(function() {
        Route::get('/', 'MovieController@getMovies');
        Route::get('/{id}', 'MovieController@getMovie');
    });

    // Series
    Route::prefix('series')->group(function() {
        Route::get('/', 'SerieController@getSeries');
        Route::get('/{id}', 'SerieController@getSerie');
    });


});
