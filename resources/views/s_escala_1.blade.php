@extends('layout.admin')

@section('content')
    <h1>Escala de Emissões</h1>
    @php

          use Carbon\Carbon;

        $dia_semana = [
            1=>'Domingo',
            2=>'Segunda-Feira',
            3=>'Terca-Feira',
            4=>'Quarta-Feira',
            5=>'Quinta-Feira',
            6=>'Sexta-Feira',
            7=>'Sabado'
        ];

        
    @endphp

   <table  class="table table-bordered">
   <thead>
        <tr class="bg-danger">
            <th>Hora</th>
            <th>Dia</th>
            <th>Dia da Semana</th>
            <th>Nome do Locutor</th>            
        </tr>

   </thead>
   <tbody>
    @foreach($escalas as $dia_semana => $emissoes)

        @foreach($emissoes as $emissao)     
        <tr class="text-nowrap text-dark" style="font-size: 18px; font-weight: bold;">
            <td>{{ $emissao->hora_inicial }} - {{ $emissao->hora_final}} </td>
            <td>{{ $emissao->dia}}</td>
            <td>{{ $emissao->dia_semana }}</td>
            <td>{{ $emissao->jornalista->nome_completo }}</td>


        </tr>
        @endforeach
    @endforeach
   </tbody>
   </table>
@endsection

