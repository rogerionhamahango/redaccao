<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornalista;
use App\Models\Programa;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ProgramaController extends Controller
{
    public function programa(){
        $dados = Jornalista::orderBy('nome_completo', 'asc')->get();
        return view('programa', ['dados'=> $dados]);
    }

    public function programa_cadastro(Request $request){

        $request->validate([
            'produtor_id'=> 'required',
            'programa'=> 'required',
            'lingua'=> 'required',
            'duracao'=> 'required',
            'data_transmissao'=> 'required',
            'data_repeticao'=> 'required'
        ]);

        if($request->filled('produtor_id', 'programa', 'lingua', 'duracao', 'data_transmissao')){
            $dados = Programa::create( $request->all() );
        return redirect()->back()->with('programa', 'Parabens o programa foi cadastrado com sucesso');

        }else{
            return redirect()->back()->with('nao', 'Verifique se preencheu todos campos.');
        }
        

}

public function s_programa(){
    $programa = DB::table('programas')
    ->join('jornalistas', 'produtor_id','=','jornalistas.id')
    ->select('jornalistas.nome_completo as nome', 'programas.programa', 'programas.lingua', 'programas.duracao', 'programas.data_transmissao', 'programas.data_repeticao')
    ->orderBy('jornalistas.nome_completo', 'asc')
    ->get();

    return view('s_programa', ['programa'=> $programa]);

}
}