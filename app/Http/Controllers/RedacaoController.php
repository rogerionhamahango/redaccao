<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Jornalista;
use App\Models\Redacao;
use App\Models\Folga;
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
    //funcao para gravar no banco de dados a escala de edicoes da redacao
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
            if (Folga::where('jornalista_id', $request->id_jornalista)
            ->where('dia', $request->dia)
            ->exists()) {
                return back()->with('folga', 'Jornalista está de folga neste dia');
            }
            //carregar dados para a tabela de base de dados
            $edicao = Edicao::create($request->all());
            return redirect()->back()->with('edicao', 'Esta edicao foi registada com sucesso');
        }
        //algo fora de conformidade? entao devolver erro.
        return redirect()->back()->with('edicao_nao', 'Edicao nao agendada');
    }
    //funcao para visualizar a escala de edicoes semanal e editavel para o chefe de redacao
    public function actualizar_redacao(){

         $inicio = now()->startOfWeek();
        $fim= now()->endOfWeek();
        $dias = \Carbon\CarbonPeriod::create($inicio, $fim);
        $dias -> locale('pt-PT');

        $horas = [
            '8:10',
            '12:00',
            '15:00',
            '19:00',
            '23:00'
        ];
        


        $escala_edicoes = Edicao::whereBetween(DB::raw('DATE(dia)'), [$inicio, $fim])
            ->with('jornalista')
            ->get();

            //contar o numero de vezes que aparece o jornalista na escala de edicoes
            $jornalista_contagem = $escala_edicoes
                ->groupBy('jornalista.abreviatura')
                ->map(fn($jornalista) => $jornalista->count());

            


            return view('actualizar_redacao', compact('dias', 'horas', 'escala_edicoes', 'jornalista_contagem'));
    }

    //funcao para mostrar a view de busca de jornalistas e locutores
    public function act_redacao($id){
        $edicao = Edicao::findOrFail($id);
        $jornalistas = Jornalista::orderBy('nome_completo', 'asc')
        ->get();

        return view('act_redacao', compact('edicao', 'jornalistas'));
    }

    //funcao para actualizar a escala de edicoes no banco de dados
    public function actualizarEscala(Request $request, $id){
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
        if($request->filled([
            'id_jornalista',
            'dia',
            'dia_semana',
            'horas',
            'lingua'
        ])){

               //  VERIFICA FOLGA CORRIGIDO
    if (Folga::where('jornalista_id', $request->locutor_id)
        ->where('dia', $request->dia)
        ->exists()) {

        return back()->with('folga', 'Jornalista está de folga neste dia');
    }
            $edicao = Edicao::findOrFail($id);
            dd($request->all());
            $edicao->update($request->all());

            return redirect()->route('actualizar_redacao')->with('atualizada', 'Escala de edicoes actualizada com sucesso');
        }
        return redirect()->route('actualizar_redacao')->with('nao_atualizada', 'Escala de edicoes nao actualizada, verifique os dados e tente de novo');    

    }

}