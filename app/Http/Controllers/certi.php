<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class certi extends Controller
{
    public function home(){
        return view('home');
    }

    public function issue(){
        return view('issue');
    }

    // public function create()
    // {
    //     echo("haha created");
    // }

    public function store(Request $request)
    {
        $event_name         = $_GET['event_name'];
        $event_description  = $_GET['event_description'];
        $created_for        = $_GET['created_for'];
        $created_by_id      = $_GET['created_by_id'];
        $background         = $_GET['background'];
        $committe           = $_GET['committe'];
        $winner             = $_GET['winner'];
        echo ($background);
        // return redirect()->route('home')
        // ->with('success','E-CERTI CREATED !');
    }


}

