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

    public function getMovies()
    {
      return Movie::all();
    }

}
