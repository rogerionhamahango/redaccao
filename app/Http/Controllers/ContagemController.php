<?php

namespace App\Http\Controllers;
use App\Models\Emissao;
use App\Models\Jornalista;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ContagemController extends Controller
{
   public function contagem(){
     $hoje = now();
    $primeiroDiaMes = $hoje->copy()->startOfMonth();
    $ultimoDiaMes = $hoje->copy()->endOfMonth();

    // Criar período de semanas do mês
    $semanas = [];
    $periodo = CarbonPeriod::create($primeiroDiaMes, '1 week', $ultimoDiaMes);
    foreach ($periodo as $inicioSemana) {
        $fimSemana = $inicioSemana->copy()->endOfWeek();
        $semanas[] = [
        'inicio' => $inicioSemana->copy(),
        'fim' => $fimSemana->copy()
        ];
}

    // Pegar todos os locutores (apenas nome)
    $jornalistas = Jornalista::select('nome_completo')->get();

    // Montar tabela: cada locutor terá uma contagem por semana
    $tabela = [];
foreach ($jornalistas as $jornalista) {
    $linha = ['nome' => $jornalista->nome_completo];

    foreach ($semanas as $index => $semana) {
        // Contar turnos dessa semana
        $turnos = Emissao::whereBetween(DB::raw('DATE(dia)'), [$semana['inicio'], $semana['fim']])
            ->where('jornalista_id', $jornalista->id)
            ->count();

        $linha['semana_' . ($index + 1)] = $turnos;
    }

    $tabela[] = $linha;
}

    return view('s_escala2', compact('semanas', 'tabela'));
   }
}
