<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Crew;

class SeriCrewController extends Controller
{
    // Check logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $crew = Crew::all();

        // Return
        return view('seri.admin.crew.index', compact('crew'));
    }


    public function ajax()
    {
        $crew = Crew::all();

        return view('seri.admin.crews.ajax', compact('crew', 'amount', 'offset'));
    }

    public function postAjax()
    {
        $crew = Crew::all();

        return view('seri.admin.crews.ajax', compact('crew', 'amount', 'offset'));
    }
}
