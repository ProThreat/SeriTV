<?php

namespace App\Http\Controllers;

use App\WatchedMovies;
use Illuminate\Http\Request;

class WatchedMoviesController extends Controller
{
    public function addWatched(Request $request)
    {
        // Add watched movie
        WatchedMovies::create(['user_id' => $request->user_id, 'movie_id' => $request->movie_id]);
    }
}
