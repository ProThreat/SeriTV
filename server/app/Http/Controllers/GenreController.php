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

        // Loop genres
        foreach(Genre::orderBy('genre')->get() as $genre)
          $genres[$genre->id] = $genre->genre;

        // Sort array
        sort($genres);
          
        // Return values
        return json_encode($genres);
    }

}
