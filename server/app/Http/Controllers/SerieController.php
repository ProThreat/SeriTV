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

    public function getSeries()
    {
      return Serie::all();
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
