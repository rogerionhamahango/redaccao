<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornalista;
use App\Models\Greandereportagem;
use Illuminate\Support\Facades\DB;

class GranderepController extends Controller
{
    public function grande_reportagem(){
        $reportagem = Jornalista::orderBy('nome_completo', 'asc')->get();
        return view('grande_reportagem', ['reportagem'=> $reportagem]);
    }

    public function grandereportagem(Request $request){
        $request->validate([
            'jornalista_id'=> 'required',
            'tema'=> 'required',
            'mes_ano'=> 'required',



        ]);

        if($request->filled('jornalista_id', 'tema', 'mes_ano')){
            $reportagem = Greandereportagem::create($request->all());
            return redirect()->back()->with('reportagem', 'Tema guardado com sucesso');
        }


    }

        public function s_g_reportagem(){
        $reportagem = DB::table('grandereportagem')
        ->join('jornalistas', 'jornalista_id','=','jornalistas.id')
        ->select('jornalistas.nome_completo as nome', 'grandereportagem.tema', 'grandereportagem.mes_ano')
        ->orderBy('jornalistas.nome_completo')
        ->get();

        return view('s_g_reportagem', ['reportagem' => $reportagem]);
    
    }
}
