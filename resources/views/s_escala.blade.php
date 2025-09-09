@extends('layout.home')

@section('title')
    escala
@endsection


@section('table')
    Escala de Locutores
@endsection


@section('content')

    <table class="table table-bordered">
        <tr class="bg-danger">
            <th>
               Data
            </th>
            <th>Horas</th>
            <th>Nome do Locutor</th>
            


            @foreach ($dados as $escala)
               <tr>

                <th class="bg-primary">{{$escala->dia}} - {{$escala->dia_semana}}</th>
                <th class="bg-success">{{$escala->hora_inicial}}<=>{{$escala->hora_final}}</th>
                <th class="bg-warning">{{$escala->nome}}</th>
                
                
        
        
                </tr>               
            @endforeach
        </tr>
    </table>
    
@endsection