<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoggedController extends Controller
{
    public function logged(){
        return view('logged');
    }
}   