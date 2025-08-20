@extends('layout.home')

@section('title', 'redacao')

@section('table')
    Saida da redacao
    
@endsection


@section('content')

<table  class="table table-bordered">
    <tr class="table-danger">
        <th>Nome</th>
        <th>Trabalho</th>
        <th>Linguas</th>
        <th>Data</th>
        <th>Situacao</th>
        <th>Funcoes</th>
        @foreach ($agenda as $trabalho)
        <tr>
            <th>{{$trabalho->nome}}</th>
            <th>{{$trabalho->agenda}}</th>
            <th>{{$trabalho->linguas_car}}</th>
            <th>{{$trabalho->data}}</th>
            <th>Pendente</th>
            <th><a href="" class="btn btn-success">Gravado</a>
                <a href="" class="btn btn-danger">Nao Gravado</a>
            
            </th>
            
        </tr>
            
        @endforeach

    </tr>


</table>
    
@endsection