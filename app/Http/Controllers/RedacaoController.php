<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornalista;
use App\Models\Redacao;

class RedacaoController extends Controller
{
    
    public function redacao(){
    $dados = Jornalista::orderBy('nome_completo', 'asc')->get();
    return view('redacao', ['dados'=>$dados]);
}



public function agenda(Request $request){
    $request->validate([
        'jornalista_id'=> 'required',
        'data'=> 'required',
        'agenda'=> 'required',
       
    ],
    [
        'jornalista_id.required'=> 'Obrigatorio selecionar o trabalhador',
        'data.required'=> 'Obrigatorio definir data da agenda',
        'agenda.required'=> 'Obrigatorio informar a a genda deste trabalhador',
   
    ]);
    if($request->filled([
        'jornalista_id',
        'data',
        'agenda',
    
    ])){
        $agenda = Redacao::create( $request->all() );
        return redirect()->back()->with('agendado', 'Agenda marcada com sucesso!');
    }
        return redirect()->back()->with('nao_agendado', 'Agenda nao marcada, verifique e tente de novo.');
    }

}

