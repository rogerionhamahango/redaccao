<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilizador;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Illuminate\Support\Facades\Auth;

class UtilizadorController extends Controller
{

    public function rede(){
        return view('welcome');
    }

    public function utilizador(){
        return view('utilizador');
    }

    public function gravar(Request $request){
        $request->validate([
            'nome_completo'=>'required',
            'nome_utilizador'=> 'required',
            'email'=> 'required|email',
            'telefone'=> 'required',
            'tipo_utilizador'=> 'required',
            'senha'=> 'required|min:6',
            //'confirmacao'=> 'required|same:senha',
        ],
    [
        'nome_completo.required'=> 'O campo e obrigatorio!',
        'nome_utilizador.required'=> 'O campo nome do utilizador e obrigatorio!',
        'email.required'=> 'O email e obrigatorio!',
        'tipo_utilizador.required'=> 'O campo e obrigatorio!',
        'senha.required'=> 'Forneca senha!',
        'confirmacao.required'=>'Confirme a senha!'
    ]);

        if($request->input('senha') == $request->input('confirmacao')){

             if($utilizador = Utilizador::where('email', $request->email)->first()){
            return redirect()->back()->with('email','Este email ja foi registado!');
        }

            $utilizador = Utilizador::create( $request->all() );

            return redirect()->back()->with('success','Utilizador registado com sucesso!');
            //dd($utilizador);

        }else{
            
            if($request->input('senha') != $request->input('confirmacao')){
                return redirect()->back()->with('errorsenha','Senhas diferentes');
        }
       

}
    }

    public function logar(Request $request){
        $request->validate([
            'nome_utilizador'=> 'required',
            'senha'=> 'required|min:6',
        ],[
            'nome_utilizador.required'=> 'Forneca nome do utilizador',
            'senha.required'=> 'Forneca a senha',

        ]);
        $utilizador = Utilizador::where('nome_utilizador', $request->nome_utilizador)->first();
        
        
        if(!$utilizador){
            return redirect()->back()->with('errado','Utilizador nao encontrado!');
        }
        

        if(!$utilizador){
            return redirect()->back()->with('credenciais','As credenciais fornecidas nao se ajustam no sistema!');
        }
        if(!password_verify($request->senha, $utilizador->senha)){
            return redirect()->back()->with('autenticacao','Verifique o nome de utilizador ou senha e tenta de novo!');
        }
        Auth::loginUsingId($utilizador->id);
        
        if($utilizador-> tipo_utilizador == 'Chefe de Redacao'){
            return redirect()->route('logged');
        }else if($utilizador->tipo_utilizador == 'Chefe de Emissoes'){
            return redirect()->route('emissaolog');
        }
        if($utilizador->tipo_utilizador == 'Admin do Sistema');
           return redirect()->route('adminsis');
    }

    public function logout()
    {
        Auth::logout(); // encerra a sessão

        return view('home');
    }
}    