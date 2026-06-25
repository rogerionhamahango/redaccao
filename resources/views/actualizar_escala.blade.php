@extends('layout.home')

@section('title')
    Escala Semanal
@endsection

@section('table')
    Escala semanal de Locutores sujeito a actualizacao

    
@endsection

@section('content')

<!-- Botao voltar -->
<div class="mb-3">
    <a href="{{ route('adminsis') }}" class="btn btn-primary">Voltar</a>
</div>

<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>HORAS</th>
            @foreach ($dias as $dia)
                <th>
                    {{ $dia->format('d/m') }} <br>
                    {{ $dia->translatedFormat('l') }}
                </th>
            @endforeach
        </tr>
    </thead>

    <tbody class="table-warning">

        @foreach($horas as $hora)
            <tr>
                <td><strong>{{ $hora }}</strong></td>

                @foreach ($dias as $dia)
                    <td>

                        @php
                            $escala = $escalas->first(function($e) use ($dia, $hora) {
                                return \Carbon\Carbon::parse($e->dia)->format('Y-m-d') == $dia->format('Y-m-d')
                                    && \Carbon\Carbon::parse($e->hora_inicial)->format('H:i') == \Carbon\Carbon::parse($hora)->format('H:i');
                            });
                        @endphp

                        @if ($escala)

                            <div>

                                {{-- STATUS FALTA --}}
                                @if($escala->falta)
                                    <span style="color:red; font-weight:bold;">
                                        {{ $escala->jornalista->abreviatura }} ❌ FALTOU
                                    </span>
                                @else
                                    <strong>{{ $escala->jornalista->abreviatura }}</strong>
                                @endif

                                <br>

                                {{-- EDITAR --}}
                                <a href="{{ route('actualizar', $escala->id) }}">
                                    Editar
                                </a>

                                <br>

                                {{-- MARCAR FALTA --}}
                                @if(!$escala->faltas)
                                    <form action="{{ route('marcarFalta', $escala->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            Marcar Falta
                                        </button>
                                    </form>
                                @endif

                            </div>

                        @else
                            ==
                        @endif

                    </td>
                @endforeach

            </tr>
        @endforeach

    </tbody>
</table>

<h2>Número de emissões por Locutor durante esta semana</h2>

<table class="table table-bordered text-left">
    <tr>
        <th>Nome do Locutor</th>
        <th>Número de emissões</th>
    </tr>

    @foreach($contagem as $nome => $total)
        <tr>
            <td>{{ $nome }}</td>
            <td>{{ $total }}</td>
        </tr>
    @endforeach
</table>

@endsection