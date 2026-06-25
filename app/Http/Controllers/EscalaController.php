<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Emissao;
use App\Models\Edicao;
use App\Models\Folga;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $escalas = Emissao::whereBetween('dia', [$inicio, $fim])
            ->with('jornalista')
            ->get();


       //Contar o numero de vezes que cada Locutor aparece na escala

       $contagem = $escalas
        ->groupBy(fn ($e) => $e->jornalista->abreviatura)
        ->map(fn ($grupo) => $grupo->count());

       
        if ($request->has('download')) {
            $pdf = Pdf::loadView('s_escala2', compact('dias', 'horas', 'escalas', 'contagem'));
            return $pdf->download('escala_emissoes.pdf');
        }


        return view('s_escala2',  compact('dias', 'horas', 'escalas', 'contagem'));
         
    }





    //Buscar escala de edicoes da semana, com os jornalistas e contar o numero de vezes que cada jornalista aparece na escala de edicoes
    public function escala_edicoes(Request $request)
{
    $inicio = now()->startOfWeek();
    $fim = now()->endOfWeek();

    $dias = \Carbon\CarbonPeriod::create($inicio, $fim)->locale('pt_PT');

    $horas = [
        '08:10',
        '12:00',
        '15:00',
        '19:00',
       
    ];

    $escala_edicoes = Edicao::whereBetween(DB::raw('DATE(dia)'), [$inicio, $fim])
        ->with('jornalista')
        ->get();

    // CONTAGEM
    $jornalista_contagem = $escala_edicoes
        ->groupBy('jornalista.abreviatura')
        ->map(fn($j) => $j->count());

    //  RESUMO DAS 23H (12h + 15h + 19h)
    $resumo_23h = $escala_edicoes
        ->whereIn('hora_inicial', ['12:00', '15:00', '19:00'])
        ->groupBy(fn($e) => \Carbon\Carbon::parse($e->dia)->format('Y-m-d'))
        ->map(fn($grupo) =>
            $grupo->pluck('jornalista.abreviatura')
                ->filter()
                ->values()
        );

    return view('s_escala_edicoes', compact(
        'dias',
        'horas',
        'escala_edicoes',
        'jornalista_contagem',
        'resumo_23h'
    ));
}


    //Metodo para mostrar escala detalhada de edicoes
   public function edicao_detalhada(Request $request)
{
    $hoje = Carbon::today()->toDateString();
    $tipo = $request->query('tipo', 'correntes'); // valor da URL ou padrão
    $perPage = 10;

    $query = Edicao::with('jornalista');

    // atribuir match de volta
     match ($tipo) {
        'vencidas' => $query->whereDate('dia', '<', $hoje)
                             ->orderBy('dia', 'asc'),
        'futuras'  => $query->whereDate('dia', '>', $hoje)
                             ->orderBy('dia', 'asc'),
        default    => $query->whereDate('dia', '=', $hoje)
                             ->orderBy('horas', 'asc'), // ou 'horas' se for o campo certo
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

    // Passa $tipo para a view
    return view('edicao_detalhada', compact('escalas', 'dias_semana', 'tipo'));
}


//Funcao para devolver a view de actualizar a escala

public function actualizar_escala(){

//buscar escalas da semana para a view com autorizacao de actualizar dados

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
        $escalas = Emissao::whereBetween('dia', [$inicio, $fim])
            ->with('jornalista')
            ->get();


       //Contar o numero de vezes que cada Locutor aparece na escala

       $contagem = $escalas
        ->groupBy(fn ($e) => $e->jornalista->abreviatura)
        ->map(fn ($grupo) => $grupo->count());



        return view('actualizar_escala', compact('dias', 'horas', 'escalas', 'contagem'));
    

 
}

//funcao para chamar o formulario de actualizacao da escala de emissoes
public function actualizar($id){
    $escala = Emissao::findOrFail($id);
    $locutores = DB::table('jornalistas')->get(); // ou Jornalista::all() se tiver um modelo
    
    return view('actualizar', compact('escala', 'locutores'));
}



//metodo para actualizar a escala de emissoes, recebe os dados do formulario e actualiza a escala no banco de dados

public function actualizaEscala(Request $request, $id)
{
    $request->validate([
        'locutor_id' => 'required',
        'hora_inicial' => 'required',
        'hora_final' => 'required',
        'dia' => 'required',
     
    ]);

    $escala = Emissao::findOrFail($id);

    // impede editar se já marcou falta
    if ($escala->faltas==true) {
        return back()->with('falta', 'Não é possível editar uma emissão já marcada como falta');
    }

    // verifica folga
    if (Folga::where('jornalista_id', $request->locutor_id)
        ->where('dia', $request->dia)
        ->exists()) {

        return back()->with('folga', 'Jornalista está de folga neste dia');
    }

    $escala->update([
        'locutor_id' => $request->locutor_id,
        'hora_inicial' => $request->hora_inicial,
        'hora_final' => $request->hora_final,
        'dia' => $request->dia,
    ]);

    return back()->with('success', 'Escala atualizada com sucesso!');
}

//Metodo que regista folgas no banco de dados
public function registar_folga(Request $request){
        $request->validate([
            'jornalista_id'=>'required',
            'dia'=>'required',
            'dia_semana'=>'required'
        ],[
            'jornalista_id.required'=>'Indique o Jornalista',
            'dia.required'=>'Indique o dia da folga',
            'dia_semana.required'=>'O campo dia de semana deve ser preenchido'
        ]);

        Folga::create($request->all());

        return back()->with('success', 'Folga registada com sucesso!');


    }
//Metodo que visualiza as folgas durante a semana. 
public function folgas(){
    $jornalistas = DB::table('jornalistas')->get();
    $folgas = Folga::with('jornalista')->get();

    return view('folgas', compact('jornalistas', 'folgas'));
    
    }

    

   public function s_folgas(){

    \Carbon\Carbon::setLocale('pt_PT');

    $inicio = now()->startOfWeek();
    $fim = now()->addWeeks(2)->endOfWeek();

    $dias = \Carbon\CarbonPeriod::create($inicio, $fim);

    $folgas = Folga::with('jornalista')
        ->whereBetween('dia', [$inicio->toDateString(), $fim->toDateString()])
        ->get()
        ->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->dia)->format('Y-m-d');
        });

    return view('s_folgas', compact('dias', 'folgas'));
}

//Metodo que actualiza a escala de edicoes no banco de dados, recebe os dados do formulario e actualiza a escala de edicoes no banco de dados
public function actualizarEscalaEdicoes(Request $request, $id)
{
    $request->validate([
       'id_jornalista' => 'required',
        'dia' => 'required',
        'horas' => 'required',
        'lingua' => 'required'
    ]); 

    $escalaEdicoes = Edicao::findOrFail($id);

        if(Folga::where('jornalista_id', $request->id_jornalista)->where('dia', $request->dia)->exists()){
            return back()->with('folga', 'Este jornalista está de folga neste dia, escolha outro por favor.');
        }

        
        $escalaEdicoes->update([
            'id_jornalista' => $request->id_jornalista,
            'dia' => $request->dia,
            'horas' => $request->horas,
            'lingua' => $request->lingua
        ]);

        return back()->with('success', 'Escala de edições atualizada com sucesso!');

    }    
        

}