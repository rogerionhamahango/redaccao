<?php

namespace App\Http\Controllers;

use App\Models\Jornalista;
use App\Models\Emissao;
use Illuminate\Http\Request;
use App\Models\Folga;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmissaoController extends Controller
{

    //esta funcao serve para registar emissao (produzir a escala de locutores nas emissoes)
    public function emissao(){
        $dados = Jornalista::orderBy('abreviatura', 'asc')
       
        ->get();

        return view('emissao', ['dados'=> $dados]);
    }

    //Gravar dados da emissao no banco de dados

  

public function emissao_loc(Request $request)
{
    $request->validate([
        'locutor_id'=> 'required',
        'hora_inicial'=> 'required',
        'hora_final'=> 'required',
        'dia'=> 'required|date',
        'dia_semana'=> 'required',
    ],[
        'locutor_id.required'=> 'Indique o locutor.',
        'hora_inicial.required'=> 'Indique a hora inicial da emissao.',
        'hora_final.required'=> 'Indique a final da emissao',
    ]);

    // verificar folga
    if (Folga::where('jornalista_id', $request->locutor_id)
        ->where('dia', $request->dia)
        ->exists()) {
        return redirect()->back()->with('folga', 'Este quadro está de folga neste dia, escolha outro, por favor.');
    }

    // trabalhar com data
    $data = Carbon::parse($request->dia);

    // início e fim da semana
    $inicio = $data->copy()->startOfWeek();
    $fim = $data->copy()->endOfWeek();

    // contar emissões na semana
    $total_emissoes = Emissao::where('locutor_id', $request->locutor_id)
        ->whereBetween('dia', [$inicio, $fim])
        ->count();

    // regra de limite
    if ($total_emissoes >= 4) {
        return redirect()->back()->with('limite', 'Este profissional já tem 4 emissões agendadas para esta semana, indique outro por favor.');
    }

    // criar emissão
    Emissao::create([
        'locutor_id' => $request->locutor_id,
        'hora_inicial' => $request->hora_inicial,
        'hora_final' => $request->hora_final,
        'dia' => $request->dia,
        'dia_semana' => $request->dia_semana,
    ]);

    return redirect()->back()->with('emissao', 'Emissao agendada com sucesso!');
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