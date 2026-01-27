<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emissao;
use Carbon\Carbon;

class SemanaController extends Controller
{
    public function vencida_corrente_futura(Request $request)
    {
        $hoje = Carbon::today()->toDateString();
        $tipo = $request->query('tipo', 'correntes');
        $perPage = 10;

        $query = Emissao::with('jornalista');

        match ($tipo) {
            'vencidas' => $query->whereDate('dia', '<', $hoje)
                                 ->orderBy('dia', 'desc'),

            'futuras'  => $query->whereDate('dia', '>', $hoje)
                                 ->orderBy('dia', 'asc'),

            default    => $query->whereDate('dia', '=', $hoje)
                                 ->orderBy('hora_inicial', 'asc'),
        };

        $escalas = $query->paginate($perPage);

        $dias_semana = [
            0 => 'Domingo',
            1 => 'Segunda-Feira',
            2 => 'Terça-Feira',
            3 => 'Quarta-Feira',
            4 => 'Quinta-Feira',
            5 => 'Sexta-Feira',
            6 => 'Sábado'
        ];

        return view('vencida_corrente_futura', compact(
            'escalas',
            'tipo',
            'dias_semana'
        ));
    }
}
