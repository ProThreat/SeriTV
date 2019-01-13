<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\Producer;
use \App\Licensor;
use \App\Studio;

class CompanyController extends Controller
{

    //Check logged in
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getProducers()
    {
        // Give values like id => value
        $items = [];
        foreach(Producer::all() as $item)
          $items[$item->id] = $item->name;

        // Return values
        return json_encode($items);
    }

    public function getLicensors()
    {
      // Give values like id => value
      $items = [];
      foreach(Licensor::all() as $item)
        $items[$item->id] = $item->name;

      // Return values
      return json_encode($items);
    }

    public function getStudios()
    {
      // Give values like id => value
      $items = [];
      foreach(Studio::all() as $item)
        $items[$item->id] = $item->name;

      // Return values
      return json_encode($items);
    }

}
