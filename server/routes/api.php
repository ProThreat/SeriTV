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

// Login routes
Route::post('/register', 'Auth\LoginController@register');
Route::post('/login', 'Auth\LoginController@authenticate');

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
        Route::get('/search/{search}', 'MovieController@getMoviesBySearch');
    });

    // Watched movies
    Route::prefix('watched_movies')->group(function() {
        Route::post('/', 'WatchlistMoviesController@addWatched');
    });

    // Series
    Route::prefix('series')->group(function() {
        Route::get('/{index}&{amount}', 'SerieController@getSeries');
        Route::get('/{id}', 'SerieController@getSerie');
        Route::get('/score/{score}', 'SerieController@getSerieByScore');
        Route::get('/title/{title}', 'SerieController@getSerieByTitle');
    });

    // Image upload
    Route::post('/uploadImage', 'SerieController@uploadImage');

});
