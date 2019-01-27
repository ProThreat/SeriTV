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

    public function getMoviesBySearch($filters)
    {
        // Get query
        $query = Movie::whereNotNull('id');

        // Get filters
        parse_str($filters, $filterArray);
        $filterArray = array_filter($filterArray);

        // Seperate filters
        $seperateFilters = ['title', 'type'];
        $whereFilters = array_intersect_key($filterArray, array_flip($seperateFilters));
        $relationFilters = array_diff_key($filterArray, array_flip($seperateFilters));

        // Apply where filters
        foreach($whereFilters as $key => $filter)
            $query->where($key, 'LIKE', '%'.$filter.'%');

        // Apply relation model filters
        foreach($relationFilters as $key => $filter)
        {
            // If trying to get score, then get from reviews table
            // Else make string plural (so filter is according to the naming conventions, also see Movie model)
            $key = $key == 'score' ? 'reviews' : str_plural($key);
            
            // Then get rating
            // Or if not score then filters results on given array
            $query->whereHas($key, function($query) use($key, $filter) {
                if($key == 'reviews') {
                    $filter = explode(',', $filter);
                    $query->whereBetween('rating', [$filter[0], $filter[1]]);
                } else if($key == 'studios' || $key == 'producers' || $key == 'licensors') {
                    $query->whereIn('name', explode(',', $filter));
                } else {
                    $query->whereIn(str_singular($key), explode(',', $filter));
                }
            });
        }

        // Results
        return $query->get();
    }

    public function getMovies()
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
