<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrenteControler extends Controller
{
    //funcao que devolve uma view de chefes das frentes;
    public function frente(){
        return view('frentes');
    }
}
