@extends('layout.home')

@section('title', 'redacao')

@section('table')
    Saida Grande reportagem
    
@endsection


@section('content')

<table  class="table table-bordered">
    <tr class="table-danger">
        <th>Nome</th>
        <th>Tema</th>
        <th>Mes e Ano</th>
        @foreach ($reportagem as $report)
        <tr>
            <th>{{$report->nome}}</th>
            <th>{{$report->tema}}</th>
            <th>{{$report->mes_ano}}</th>
           
            
        </tr>
            
        @endforeach

    </tr>


</table>
    
@endsection