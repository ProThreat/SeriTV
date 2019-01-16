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

// Api v1
Route::prefix('v1')->group(function() {

    // Get types
    Route::get('genres', 'GenreController@index');
    Route::get('types', 'TypeController@index');
    Route::get('people', 'PeopleController@index');

    // Companies
    Route::get('producers', 'CompanyController@getProducers');
    Route::get('licensors', 'CompanyController@getLicensors');
    Route::get('studios', 'CompanyController@getStudios');

    // Movies
    Route::prefix('movies')->group(function() {
        Route::get('/', 'MovieController@getMovies');
        Route::get('/{id}', 'MovieController@getMovie');
        Route::get('/score/{score}', 'MovieController@getMoviesByScore');
        Route::get('/title/{title}', 'MovieController@getMoviesByTitle');
    });

    // Series
    Route::prefix('series')->group(function() {
        Route::get('/', 'SerieController@getSeries');
        Route::get('/{id}', 'SerieController@getSerie');
    });

    // Image upload
    Route::post('/uploadImage', 'SerieController@uploadImage');

});
