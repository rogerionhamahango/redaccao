<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornalista;
use App\Models\Redacao;
use Illuminate\Contracts\Queue\Job;

class JornalistaController extends Controller
{
    //este metodo devolve a view para cadastro do locutor e jornalista
    public function jornalista(){
        return view('jornalista');
    }

    //este metodo visa cadastrar o jornalista e locutor no banco de dados.

    public function gravar_jornalista(Request $request){

        $request->validate([
            'nome_completo'=> 'required',
            'genero'=> 'required',
            'nuit'=> 'required',
            'data_admissao'=> 'required',
            'celular_principal'=>'required',
            'celular_alternativo'=> 'required',
            'email'=> 'required',
            'carreira'=> 'required',
            'linguas_car'=> 'required',
            'categoria_actual'=>'required',
            'redacao_de'=> 'required',



        ],
    [
        'nome_completo.required'=>'Campo nome obrigatorio!',
        'genero.required'=>'Campo genero obrigatorio!',
        'nuit.required'=>'Campo NUIT obrigatorio!',
        'data_admissao.required'=>'Campo data de admissao obrigatorio!',
        'celular_principal.required'=>'Campo celular principal obrigatorio!',
        'celular_alternativo.required'=>'Campo celular alternativo obrigatorio!',
        'email.required'=>'Campo email  obrigatorio!',
        'carreira.required'=>'Campo carreira obrigatorio!',
        'linguas_car.required'=>'Campo linguas obrigatorio!',
        'categoria_actual.required'=>'Campo categoria actual obrigatorio!',
        'redacao_de.required'=>'Campo Redacao de  obrigatorio!',
    ]);
    

    if($request->input('nuit')){
        if($data=Jornalista::where('nuit', $request->nuit)->first()){
            return redirect()->back()->with('nuit', 'Este NUIT ja foi registado! ');

    } else {
    $data = Jornalista::create($request->all());
    return redirect()->back()->with('jornalista', 'Locutor ou Jornalista cadastrado com sucesso. Obrigado');


    }  
    }  
}

}