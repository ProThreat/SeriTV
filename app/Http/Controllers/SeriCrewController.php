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
        // Get crew
        $crew = Crew::all();

        // View
        return view('seri.admin.crew.index', compact('crew'));
    }


    public function ajax()
    {
        // Get crew
        $crew = Crew::all();

        // View
        return view('seri.admin.crews.ajax', compact('crew', 'amount', 'offset'));
    }

    public function postAjax()
    {
        // Get Model name
        $modelName = '\App\\'.ucfirst(strtolower(htmlspecialchars($_POST['name'])));

        // Get pagination information
        $amount = @$_POST['amount'] ?: 9;
        $offset = @$_POST['offset'] ? $_POST['offset'] * $amount : 0;

        // Get crew members
        $crew = $modelName::all();

        // Type of crew
        $crew_type = $_POST['crew_type'] ?: 'stars';

        // View
        return view('seri.admin.crews.ajax', compact('crew', 'crew_type', 'amount', 'offset'));
    }
}
