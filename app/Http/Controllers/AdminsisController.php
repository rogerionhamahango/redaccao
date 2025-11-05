<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsisController extends Controller
{
public function adminsis(){
    return view('adminsis');
}

public function home(){
    return view('home');
}
}
