<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\Serie;

class SerieController extends Controller
{

    //Check logged in
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getSerie($id)
    {
      return Serie::where(['id' => $id])->first();
    }

    public function getSeries()
    {
      return Serie::all();
    }

}
