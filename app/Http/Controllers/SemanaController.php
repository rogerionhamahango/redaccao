<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emissao;
use Carbon\Carbon;

class SemanaController extends Controller
{
 

public function vencida_corrente_futura(Request $request)
{
    $hoje = Carbon::today();
        $tipo = $request->query('tipo', 'correntes'); // padrão: correntes
        $perPage = 10;

        if ($tipo === 'vencidas') {
            $escalas = Emissao::where('dia', '<', $hoje)
                ->orderBy('dia', 'desc')
                ->with('jornalista')
                ->paginate($perPage, ['*'], 'page');
        } elseif ($tipo === 'futuras') {
            $escalas = Emissao::where('dia', '>', $hoje)
                ->orderBy('dia', 'asc')
                ->with('jornalista')
                ->paginate($perPage, ['*'], 'page');
        } else { // correntes
            $escalas = Emissao::where('dia', '=', $hoje)
                ->orderBy('hora_inicial', 'asc')
                ->with('jornalista')
                ->paginate($perPage, ['*'], 'page');
        }

        $dias_semana = [
            0 => 'Domingo',
            1 => 'Segunda-Feira',
            2 => 'Terça-Feira',
            3 => 'Quarta-Feira',
            4 => 'Quinta-Feira',
            5 => 'Sexta-Feira',
            6 => 'Sábado'
        ];

        return view('vencida_corrente_futura', compact('escalas', 'tipo', 'dias_semana'));
}

}
