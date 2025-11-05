<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornalista;
use App\Models\Redacao;
use App\Models\Edicao;

class RedacaoController extends Controller
{
    //funcao que pega dados no banco de dados e coloca na view da agenda da redacao
    public function redacao(){
    $dados = Jornalista::orderBy('nome_completo', 'asc')->get();
    return view('redacao', ['dados'=>$dados]);
}


//enviar dados da view redacao para banco de dados
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

    public function noticiarioJornais(){
        //capturar nome do jornalistas do banco de dados e exibir na view
        $noticiarios_jornais = Jornalista::orderBy('nome_completo', 'asc')->get();
        return view('noticiarios_jornais', ['noticiarios_jornais'=>$noticiarios_jornais]);
    }

    public function edicoes(Request $request){
        //fazendo a validacao dos campos
        $request->validate([
            'id_jornalista'=>'required',
            'dia'=>'required',
            'dia_semana'=>'required',
            'horas'=>'required',
            'lingua'=>'required'
        ],[
            'id_jornalista.required'=>'Indique o Jornalista',
            'dia.required'=>'Indique o dia da edicao',
            'dia_semana.required'=>'O campo dia de semana deve ser preenchido',
            'lingua.required'=>'Indique a lingua desta edicao'
        ]);
        //Verificar se todos campos foram preenchidos
        if($request->filled([
            'id_jornalista',
            'dia',
            'dia_semana',
            'horas',
            'lingua'
        ])){
            //carregar dados para a tabela de base de dados
            $edicao = Edicao::create($request->all());
            return redirect()->back()->with('edicao', 'Esta edicao foi registada com sucesso');
        }
        //algo fora de conformidade? entao devolver erro.
        return redirect()->back()->with('edicao_nao', 'A edicao nao agendada');
    }

}

