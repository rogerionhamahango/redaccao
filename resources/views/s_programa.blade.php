@extends('layout.home')

@section('title', 'programas')

@section('table')
    Saida programas
    
@endsection


@section('content')
<!-- Botao voltar -->
    <div class="mb-3">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </div>

<table  class="table table-bordered">
    <tr class="table-danger">
        <th>Nome</th>
        <th>Programa</th>
        <th>Linguas</th>
        <th>Duracao</th>
        <th>Data de transmissao</th>
        <th>Data de repeticao</th>
        @foreach ($programa as $prog)
        <tr>
            <th>{{$prog->nome}}</th>
            <th>{{$prog->programa}}</th>
            <th>{{$prog->lingua}}</th>
            <th>{{$prog->duracao}}</th>
            <th>{{$prog->data_transmissao}}</th>
            <th>{{$prog->data_repeticao}}</th>
            
        </tr>
            
        @endforeach

    </tr>


</table>
    
@endsection