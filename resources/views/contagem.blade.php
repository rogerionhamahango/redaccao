@extends('layout.home')

@section('content')
<h2>Contagem semanal de jornalistas</h2>

<h2>Relatório mensal de turnos</h2>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>Locutor</th>
            @foreach($semanas as $index => $semana)
                <th>Semana {{ $index + 1 }}<br>
                    {{ $semana['inicio']->format('d/m') }} - {{ $semana['fim']->format('d/m') }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($tabela as $linha)
            <tr>
                <td>{{ $linha['nome'] }}</td>
                @foreach($semanas as $index => $semana)
                    <td>{{ $linha['semana_' . ($index + 1)] }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@endsection