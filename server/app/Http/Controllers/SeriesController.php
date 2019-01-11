<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\Series;

class SeriesController extends Controller
{

    //Check logged in
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getSerie($id)
    {
      return Series::where(['id' => $id])->first();
    }

    public function getSeries()
    {
      return Series::all();
    }

}
