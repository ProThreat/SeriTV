<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;

class SeriTypeController extends Controller
{

    //Check logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = Type::all();

        //Return
        return view('seri.admin.type.index', compact('types'));
    }

    public function store(Request $request)
    {
        //Foreach genre in form
        foreach($request->input('row') as $key => $item)
        {
            //Remove empty items
            $item = array_filter($item);


            //Save genre
            if(!empty($item)) {
                if(@$item['delete']) //Delete item
                    Type::destroy(@$item['id']);
                else //Create item or update if id is given and it exists in the database
                    Type::updateOrCreate([ 'id' => @$item['id'] ], $item);
            }

        }

        //Return
        return back();
    }

}
