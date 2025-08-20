<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redacao;

class AgendadoController extends Controller
{
    public function agendado(){
        $agendado = Redacao :: orderBy('id', 'asc')->get();
        return view('agendado', ['agendado'=> $agendado]);
    }
}
