<?php

use App\Http\Controllers\AdminsisController;
use App\Http\Controllers\AgendadoController;
use App\Http\Controllers\EmissaoController;
use App\Http\Controllers\EmissaologgedController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\RedacaoController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\GranderepController;
use App\Http\Controllers\JornalistaController;
use App\Http\Controllers\LoggedController;
use App\Http\Controllers\S_redacaoController;
use App\Models\Greandereportagem;
use App\Models\Utilizador;
use App\Http\Controllers\EscalaController;
use App\Http\Controllers\FrenteControler;
use App\Http\Controllers\SemanaController;
use Illuminate\Support\Facades\Route;



    Route::get('/', [AdminsisController::class, 'home'])->name('home');
    

    
    //rotas em grupo
    Route::prefix('admin')->group(function () {
    Route::get('/home', [AdminsisController::class, 'home'])->name('home');
        //rota para login
    Route::get('/rede', [UtilizadorController::class, 'rede'])->name('rede');
        //rota para registar emissao
    Route::get('/emissao', [EmissaoController::class, 'emissao'])->name('emissao');
        //rota para agendas da diarias da redacao
    Route::get('/redacao', [RedacaoController::class, 'redacao'])->name('redacao');
        //rota para agendar um programa de radiodifusao
    Route::get('/programa', [ProgramaController::class, 'programa'])->name('programa');
        //rota para registar dados na base de dados
    Route::post('/gravar', [UtilizadorController::class, 'gravar'])->name('gravar');
        //rota o autenticacao
    Route::post('/logar', [UtilizadorController::class,'logar'])->name('logar');
        //rota para administrador do sistema
    Route::get('/adminsis', [AdminsisController::class, 'adminsis'])->name('adminsis');
        //rota para sair/logout
    Route::get('/logout', [UtilizadorController::class, 'logout'])->name('logout');
        //rota para agendar grande reportagem
    Route::get('grande_reportagem', [GranderepController::class, 'grande_reportagem'])->name('grande_reportagem');
        //rota para cadastrar jornalistas
    Route::get('/jornalista', [JornalistaController::class, 'jornalista'])->name('jornalista');
    Route::post('gravar_jornalista', [JornalistaController::class,'gravar_jornalista'])->name('gravar_jornalista');
        //rota para cadastrar o utilizador do sistema
    Route::get('/utilizador', [UtilizadorController::class,'utilizador'])->name('utilizador');
        //rota de busca ainda em construcao
    Route::get('/busca', [RedacaoController::class, 'busca'])->name('busca');
        //rota de agenda da redacao para registar no banco de dados
    Route::post('/agenda', [RedacaoController::class, 'agenda'])->name('agenda');
        //rota para vizualizar tarefas agendadas para chefe de redacao
    Route::get('/agendado', [AgendadoController::class, 'agendado'])->name('agendado');
        //rota de registar programas no banco de dados
    Route::post('/programa_cadastro', [ProgramaController::class, 'programa_cadastro'])->name('programa_cadastro');
        //rota que devolve a view de logged in do chefe da redacao
    Route::get('/logged', [LoggedController::class,'logged'])->name('logged');
        //rota que devolve a view de logged in do chefe de emissoes
    Route::get('/emissaolog', [EmissaologgedController::class,'emissaolog'])->name('emissaolog');
        //rota que regista a emissao no banco de dados
    Route::post('/emissao_loc', [EmissaoController::class,'emissao_loc'])->name('emissao_loc');
        //rota que grava no banco de dados grande reportagem
    Route::post('/grandereportagem', [GranderepController::class,'grandereportagem'])->name('grandereportagem');
        //rota de view da agenda de redacao para todos visitantes da pagina
    Route::get('/s_redacao', [S_redacaoController::class,'s_redacao'])->name('s_redacao');
        //rota para view de jornalista e locutores registados
    Route::get('/s_jornalistas', [S_redacaoController::class,'s_jornalistas'])->name('s_jornalistas');
        //rota de saida da view de programas cadastrados
    Route::get('/s_programa', [ProgramaController::class,'s_programa'])->name('s_programa');
        //rota de saida de grande reportagem
    Route::get('/s_g_reportagem', [GranderepController::class,'s_g_reportagem'])->name('s_g_reportagem');
        //rota de saida de escala geral com formatacao basica
    Route::get('s_escala', [EmissaoController::class,'s_escala'])->name('s_escala');
        //rota de saida de escala de emissoes outra forma de visualizar
    Route::get('/escalaEmissoes', [EmissaoController::class,'escalaEmissoes'])->name('escalaEmissoes');
        //rota de semanal e actualizada
    Route::get('/escala', [EscalaController::class, 'escala'])->name('escala');
        //rota de saida na view de escala de edicoes semanais
    Route::get('/escala_edicoes', [EscalaController::class, 'escala_edicoes'])->name('escala_edicoes');
        //rota para view dos chefes da frente.
    Route::get('/frente', [FrenteControler::class, 'frente'])->name('frente');

    //rota para exibir na view o modelo de registar escala de edicoes
    Route::get('/noticiarioJornais', [RedacaoController::class, 'noticiarioJornais'])->name('noticiarioJornais');
        //rota para registar escala de edicoes no banco de dados
    Route::post('/edicoes', [RedacaoController::class, 'edicoes'])->name('edicoes');
    Route::get('vencida_corrente_futura', [SemanaController::class, 'vencida_corrente_futura'])->name('vencida_corrente_futura');
    
});