<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornalista;
use Illuminate\Support\Facades\DB;

class S_redacaoController extends Controller
{
    public function s_redacao()
    {
        $agenda = DB::table('redacao')
        ->join('jornalistas', 'redacao.jornalista_id','=','jornalistas.id')
        ->select('jornalistas.nome_completo as nome', 'jornalistas.linguas_car', 'jornalistas.redacao_de', 'redacao.data', 'redacao.agenda')
        ->orderBy('jornalistas.nome_completo','asc')
        ->get();
        return view('s_redacao', ['agenda'=> $agenda]);
    }


    public function s_jornalistas(){
        $jornalistas = Jornalista :: orderBy('nome_completo','asc')->paginate(10);
        return view('trabalhador', ['jornalistas'=> $jornalistas]);
    }


}
