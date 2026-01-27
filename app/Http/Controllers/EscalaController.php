<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Emissao;
use App\Models\Edicao;
use Carbon\Carbon;

class EscalaController extends Controller
{
    public function escala(Request $request)
    {
        //buscar escalas da semana

        $inicio = now()->startOfWeek();
        $fim = now()->endOfWeek();

        $dias = \Carbon\CarbonPeriod::create($inicio, $fim);
        $dias->locale('pt_PT');

        $horas = [
            '4:30',
            '9:55',
            '13:55',
            '18:55',
            '0:00'
        ];

       $escalas = Emissao::whereBetween(DB::raw('DATE(dia)'), [$inicio, $fim])
       ->with('jornalista')
       ->get();

       //Contar o numero de vezes que cada Locutor aparece na escala

       $contagem = $escalas
              ->groupBy('jornalista.nome_completo')
              ->map(fn($grupo)=> $grupo->count());


        return view('s_escala2', compact('dias', 'horas', 'escalas', 'contagem'));
    }


    public function escala_edicoes(Request $request){
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
                ->groupBy('jornalista.nome_completo')
                ->map(fn($jornalista) => $jornalista->count());

            return view('s_escala_edicoes', compact('dias', 'horas', 'escala_edicoes', 'jornalista_contagem'));
        
    }
}
