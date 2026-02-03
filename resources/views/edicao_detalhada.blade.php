@extends('layout.home')

@section('title')
    Escala de Edições Detalhada
@endsection

@section('content')

<h1>
    Escala de Edições - 
    @if($tipo == 'vencidas') Vencidas
    @elseif($tipo == 'futuras') Futuras
    @else Correntes
    @endif
</h1>

<div class="mb-3">
    <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
</div>

<!-- Botões de filtro -->
<div class="mb-3 d-flex gap-2">
    <a href="{{ route('edicao_detalhada', ['tipo' => 'vencidas']) }}" 
       class="btn {{ $tipo == 'vencidas' ? 'btn-danger' : 'btn-danger' }}">Edicoes Vencidas</a>

    <a href="{{ route('edicao_detalhada', ['tipo' => 'correntes']) }}" 
       class="btn {{ $tipo == 'correntes' ? 'btn-dark' : 'btn-primary' }}">Edicoes Correntes</a>

    <a href="{{ route('edicao_detalhada', ['tipo' => 'futuras']) }}" 
       class="btn {{ $tipo == 'futuras' ? 'btn-success' : 'btn-success' }}">Edicoes Futuras</a>
</div>

<!-- Partial da tabela -->
@include('escalas.partials.tabella_paginate', [
    'escalas' => $escalas,
    'dias_semana' => $dias_semana,
    'tipo' => $tipo
])

@endsection
