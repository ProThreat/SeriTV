<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Genre;

class GenreController extends Controller
{
    // Check logged in
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // Give values like id => value
        $genres = [];
        foreach(Genre::all() as $genre)
          $genres[$genre->id] = $genre->genre;

        // Return values
        return json_encode($genres);
    }

}
