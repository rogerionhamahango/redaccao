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


        return view('s_escala2', compact('dias', 'horas', 'escalas'));
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

            return view('s_escala_edicoes', compact('dias', 'horas', 'escala_edicoes'));
        
    }
}
