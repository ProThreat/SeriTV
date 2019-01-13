<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\Movie;

class MovieController extends Controller
{

    //Check logged in
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getMovie($id)
    {
      return Movie::where(['id' => $id])->first();
    }

    public function getMoviesByScore($score)
    {
        $score = floatval($score);
        return Movie::where(['imdb_rating' => $score])->get();
    }

    public function getMoviesByTitle($title)
    {
        return Movie::where('title', 'LIKE', '%'.$title.'%')->get();
    }

    public function getMovies($index, $amount)
    {
      // Get table and get parameters
      $movie = \DB::table('movies');
      $getters = Input::get();

      // Add offset/limit
      $movie->offset( (@$getters['index'] * @$getters['pageSize']) ?: 0);
      $movie->limit(@$getters['pageSize'] ?: 15);

      // Return items
      return $movie->get();
    }

}
