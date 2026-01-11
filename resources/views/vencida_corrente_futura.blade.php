@extends('layout.admin')

@section('content')
<h1>Escala de Emissões</h1>
    <div class="mb-3">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </div>

<!-- Links para alternar entre categorias -->
<div class="mb-3">
    <a href="{{ route('vencida_corrente_futura', ['tipo' => 'vencidas']) }}" class="btn btn-danger">Vencidas</a>
    <a href="{{ route('vencida_corrente_futura', ['tipo' => 'correntes']) }}" class="btn btn-primary">Correntes</a>
    <a href="{{ route('vencida_corrente_futura', ['tipo' => 'futuras']) }}" class="btn btn-success">Futuras</a>
</div>

@include('escalas.partials.tabela_paginate', ['escalas' => $escalas, 'dias_semana' => $dias_semana])

{{ $escalas->links() }}
@endsection
