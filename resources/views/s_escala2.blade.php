@extends('layout.home')

@section('title')
    Escala Semanal
@endsection


@section('table')
    Escala semanal de Locutores
    
@endsection


@section('content')
<!-- Botao voltar -->
    <div class="mb-3">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
        <a href="{{ url()->current() }}?pdf=1" class="btn btn-danger">
            
    Baixar PDF
</a>
    </div>

<table class="table table-bordered text-center">
    <thead class="bg-danger">
        <tr>
            <th>HORAS</th>
            @foreach ($dias as $dia)
                <th>{{ $dia -> format('d/m') }}
                    <br>{{$dia->translatedFormat('l')}}
                </th>
                
            @endforeach
        </tr>
    </thead>
    <tbody class="table-warning">
        @foreach($horas as $hora)
            <tr>
                <td>
                    {{$hora}}
                </td>
                @foreach ($dias as $dia)
                    <td>
                        @php
                            $escala = $escalas->first(function($e) use ($dia, $hora) {
                                return \Carbon\Carbon::parse($e->dia)->format('Y-m-d') == $dia->format('Y-m-d')
                                    && \Carbon\Carbon::parse($e->hora_inicial)->format('H:i') == \Carbon\Carbon::parse($hora)->format('H:i');
                                        });

                        @endphp
                        @if ($escala)
                            @if($escala->faltas)
            <div style="color:red; font-weight:bold;">
                {{ $escala->jornalista->abreviatura }} (Falta)
                
        @else
            <strong>{{ $escala->jornalista->abreviatura }}</strong>
        @endif

        <br>
                        @endif
                    </td>
                    @endforeach
            </tr>
        @endforeach
    </tbody>
    
</table>

<h2>Numero de emissoes por Locutor durante esta semana</h2>
<table class="table table-bordered text-left">
    <thead class="bg-danger">
        <tr>
            <th >Nome do Locutor</th>
            <th>Numero de emissoes</th>
        </tr>
    </thead> 

    <tbody> 
        @foreach($contagem as $nome => $total)
            <tr >
                <td>{{ $nome }}</td>
                <td>{{ $total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    
@endsection

