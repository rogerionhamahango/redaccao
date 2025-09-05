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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');

    
});
    Route::prefix('admin')->group(function () {
    Route::get('/rede', [UtilizadorController::class, 'rede'])->name('rede');
    Route::get('/emissao', [EmissaoController::class, 'emissao'])->name('emissao');
    Route::get('/redacao', [RedacaoController::class, 'redacao'])->name('redacao');
    Route::get('/programa', [ProgramaController::class, 'programa'])->name('programa');
    Route::post('/gravar', [UtilizadorController::class, 'gravar'])->name('gravar');
    Route::post('/logar', [UtilizadorController::class,'logar'])->name('logar');
    Route::get('/adminsis', [AdminsisController::class, 'adminsis'])->name('adminsis');
    Route::get('/logout', [UtilizadorController::class, 'logout'])->name('logout');
    Route::get('grande_reportagem', [GranderepController::class, 'grande_reportagem'])->name('grande_reportagem');
    Route::get('/jornalista', [JornalistaController::class, 'jornalista'])->name('jornalista');
    Route::post('gravar_jornalista', [JornalistaController::class,'gravar_jornalista'])->name('gravar_jornalista');
    Route::get('/utilizador', [UtilizadorController::class,'utilizador'])->name('utilizador');
    Route::get('/busca', [RedacaoController::class, 'busca'])->name('busca');
    Route::post('/agenda', [RedacaoController::class, 'agenda'])->name('agenda');
    Route::get('/agendado', [AgendadoController::class, 'agendado'])->name('agendado');
    Route::post('/programa_cadastro', [ProgramaController::class, 'programa_cadastro'])->name('programa_cadastro');
    Route::get('/logged', [LoggedController::class,'logged'])->name('logged');
    Route::get('/emissaolog', [EmissaologgedController::class,'emissaolog'])->name('emissaolog');
    Route::post('/emissao_loc', [EmissaoController::class,'emissao_loc'])->name('emissao_loc');
    Route::post('/grandereportagem', [GranderepController::class,'grandereportagem'])->name('grandereportagem');
    Route::get('/s_redacao', [S_redacaoController::class,'s_redacao'])->name('s_redacao');
    Route::get('/s_jornalistas', [S_redacaoController::class,'s_jornalistas'])->name('s_jornalistas');
    Route::get('/s_programa', [ProgramaController::class,'s_programa'])->name('s_programa');
    Route::get('/s_g_reportagem', [GranderepController::class,'s_g_reportagem'])->name('s_g_reportagem');
    Route::get('s_escala', [EmissaoController::class,'s_escala'])->name('s_escala');
    Route::get('/escalaEmissoes', [EmissaoController::class,'escalaEmissoes'])->name('escalaEmissoes');
    
});