<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
