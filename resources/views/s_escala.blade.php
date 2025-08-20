@extends('layout.home')

@section('title')
    escala
@endsection


@section('table')
    Escala de trabalho
@endsection


@section('content')

    <table class="table table-bordered">
        <tr class="bg-danger">
            <th>
                Horas ================= Dia de Semana
            </th>
            <th>Nome</th>
            <th>9h55</th>
            


            @foreach ($dados as $escala)
               <tr>

                <th class="bg-primary">{{$escala->hora_inicial}} <=> {{$escala->hora_final}} =================   {{$escala->dia_semana}}</th>
                <th class="bg-success">{{ucfirst($escala->nome)}}</th>
                <th class="bg-warning">{{$escala->dia}}</th>
                
                
        
        
                </tr>               
            @endforeach
        </tr>
    </table>
    
@endsection