@extends('layout.home')

@section('title')
    escala
@endsection


@section('table')
    Escala de Locutores

    
@endsection


@section('content')
<!-- Botao voltar -->
    <div class="mb-3">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </div>

<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>HORAS</th>
            @foreach ($dias as $dia)
                <th>{{ $dia -> format('d/m') }}
                    <br>{{$dia->translatedFormat('l')}}
                </th>
                
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($horas as $hora)
            <tr>
                <td>
                    {{$hora}}
                </td>
                @foreach ($dias as $dia)
                    <td>
                        @php
                        $escala = $escalas->firstWhere(fn($e)=>$e->dia==$dia->format('Y-m-d') && $e->hora_inicial==$hora);
                        @endphp
                        @if ($escala)
                            {{$escala->jornalista->nome_completo}}
                        @else
                            -
                        @endif
                    </td>
                    @endforeach
            </tr>
        @endforeach
    </tbody>
    
</table>

<h2>Numero de emissoes por Locutor durante esta semana</h2>
<table class="table table-bordered text-left">
    <tr>
        <th>Nome do Locutor</th>
        <th>Numero de emissoes</th>
    </tr>
    @foreach($contagem as $nome => $total)
        <tr>
            <td>{{ $nome }}</td>
            <td>{{ $total }}</td>
        </tr>
    @endforeach
</table>

    
@endsection

