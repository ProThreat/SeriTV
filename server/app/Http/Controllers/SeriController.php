<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use \App\Seri;
use \App\Movie;

class SeriController extends Controller
{

    //Check logged in
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $result = Seri::all();

        //Return
        return view('seri.items', compact('result'));
    }

    public function index_admin()
    {
        $result = Seri::all();

        //Return
        return view('seri.admin.index', compact('result'));
    }

    public function create()
    {
        $seri = new Seri;
        $seri['types'] = \App\Type::all();
        $seri['genres'] = \App\Genre::all();
        $seri['crews'] = \App\Crew::all();

        //Return
        return view('seri.admin.create', compact('seri'));
    }

    public function store(Request $request)
    {
        dd(Input::all(), Input::file('File'));
        // Check image upload
        // request()->validate([
        //     'uploadFile' => 'required',
        // ]);
        //
        // // Upload images
        // foreach ($request->file('uploadFile') as $key => $value) {
        //     $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
        //     $value->move(public_path('images'), $imageName);
        // }
        //
        // // Image size
        // $rules = array(
    		//     'file' => 'image|max:5000',
    		// );

        // Validation
		    // $validation = \Validator::make($input, $rules);
        //
        // // On error
    		// if ($validation->fails())
    		// 	return Response::make($validation->errors->first(), 400);

        // File
		    // $file = Input::file('file');
        //
        // // File information
        // $extension = File::extension($file['name']);
        // $directory = storage_path().sha1(time());
        // $filename = sha1(time().time()).".{$extension}";
        //
        // // Upload file
        // $upload_success = Input::upload('file', $directory, $filename);
        //
        // // Return message
        // if( $upload_success )
        // 	 return Response::json('success', 200);
        // else
        // 	 return Response::json('error', 400);

        dd(request(), $_POST);
        // Save Seri
        $seri = Seri::create([
            'name' => request('name'),
            'description' => request('description'),
            'type' => request('type'),
            'release_date' => request('release_date'),
            'seasons' => request('seasons'),
            'episodes' => request('episodes'),
            'aired' => request('aired'),
            'duration' => request('duration'),
            'additional_information' => request('additional_information')
        ]);

        /** Star saving pivots **/

        // Save genres
        $seri->genres()->attach(request('genre'));

        // Save crew roles into deticated tables
        foreach(request('crew') as $crew_name => $crew)
        {
            foreach($crew as $crew_id => $crew_item)
            {
                // Save foreach role
                foreach($crew_item['role'] as $role)
                    $seri->$crew_name()->attach([ $crew_id => ['role' => $role] ]);
            }
        }

        /** End saving pivots **/

        dd(request('crew')['stars'], $_POST);
        // Save crew

        // Save pivots

        // $post->comments()->saveMany([
        //     new App\Comment(['message' => 'A new comment.']),
        //     new App\Comment(['message' => 'Another comment.']),
        // ]);

        //Return
        //return back();
    }

    public function edit()
    {
        $seri = new Seri;
        $seri['types'] = \App\Type::all();
        $seri['genres'] = \App\Genre::all();
        $seri['crews'] = \App\Crew::all();

        //Return
        return view('seri.admin.edit', compact('seri'));
    }

}
