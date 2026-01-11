<?php

namespace App\Http\Controllers;

use App\Models\Jornalista;
use App\Models\Emissao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmissaoController extends Controller
{

    //esta funcao serve para registar emissao (produzir a escala de locutores nas emissoes)
    public function emissao(){
        $dados = Jornalista::orderBy('nome_completo', 'asc')
       
        ->get();
        return view('emissao', ['dados'=> $dados]);
    }

    //Gravar dados da emissao no banco de dados

    public function emissao_loc(Request $request){

        $request->validate([
            'locutor_id'=> 'required',
            'hora_inicial'=> 'required',
            'hora_final'=> 'required',
            'dia'=> 'required',
            'dia_semana'=> 'required',




        ],[
            'locutor_id.required'=> 'Indique o locutor.',
            'hora_inicial.required'=> 'Indique a hora inicial da emissao.',
            'hora_final.required'=> 'Indique a final da emissao',
        ]);

        if($request->filled('locutor_id', 'hora_inicial', 'hora_final', 'dia')){
            $emissao = Emissao::create($request->all());
            return redirect()->back()->with('emissao', 'Emissao agendada com sucesso!');
        }

    }
    //funcao de visualizar a escala de emissoes
    public function s_escala(){
        $dados = DB :: table('emissoes')
        ->join('jornalistas', 'emissoes.locutor_id','=','jornalistas.id')
        ->select('jornalistas.nome_completo as nome', 'emissoes.hora_inicial', 'jornalistas.redacao_de as redacao', 'emissoes.dia', 'emissoes.dia_semana', 'emissoes.hora_final')
        ->orderBy('dia', 'asc')
        ->get();

        return view('s_escala', ['dados'=> $dados]);

    }

    // Escala de Emissões uma forma de organizar
    public function escalaEmissoes(){

        $escalas = Emissao :: with('jornalista')
        ->orderBy('dia', 'asc')
        ->orderBy('hora_inicial')
        ->orderBy('dia_semana')
        
        
        ->get()
        ->groupBy('dia_semana');

        return view('s_escala_1', ['escalas'=> $escalas]);
    }
}