<?php

namespace App\Http\Controllers;

use App\WatchlistMovies;
use Illuminate\Http\Request;

class WatchlistMoviesController extends Controller
{
    public function addWatched(Request $request)
    {
        // Add watched movie
        WatchlistMovies::updateOrcreate(
                                        ['user_id' => $request->user_id, 'movie_id' => $request->movie_id], 
                                        ['user_id' => $request->user_id, 'movie_id' => $request->movie_id, 'watched_type' => $request->watched_type]
                                    );
    }
}
