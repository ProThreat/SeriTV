<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\Serie;

class SerieController extends Controller
{

    // Check logged in
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getSerie($id)
    {
        return Serie::where(['id' => $id])->first();
    }

    public function getSeriesByScore($score)
    {
        $score = floatval($score);
        return Serie::where(['imdb_rating' => $score])->get();
    }

    public function getSeriesByTitle($title)
    {
        return Serie::where('title', 'LIKE', '%'.$title.'%')->get();
    }

    public function getSeries($index, $amount)
    {
        $i = $index*$amount;
        return Serie::skip($i)->take($amount)->get();
    }

    public function uploadImage(Request $request)
    {
      if($image = $request->file('file'))
      {
        // Name images
        $imageName = time() .'.'. $image->getClientOriginalExtension();

        // Move file
        $image->move(public_path('img'), $imageName);

        // Response
        return response()->json(['success'=>'You have successfully uploaded a file.'], 200);
      }

      // Response
      return response()->json(['error'=>'Something went wrong.']);
    }

}
