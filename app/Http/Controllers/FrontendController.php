<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //function for call clander page
    public function loadc(){
        return view('calander');
    }
}
