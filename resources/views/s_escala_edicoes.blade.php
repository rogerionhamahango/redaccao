@extends('layout.home')

@section('title')
    escala
@endsection


@section('table')
    Escala de Edicoes    
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </div>

    <table class="table table-bordered text-left">
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
                <strong>{{ $hora }}</strong>
            </td>
            @foreach($dias as $dia)
                <td>
                    @php
                        $escala_ed = $escala_edicoes->first(function($e) use ($dia, $hora) {
                            // compara datas convertendo para Y-m-d
                            $dia_escala = \Carbon\Carbon::parse($e->dia)->format('Y-m-d');
                            $dia_atual = $dia->format('Y-m-d');

                            // compara horas padronizando (ex: 08:00)
                            $hora_escala = \Carbon\Carbon::parse($e->horas)->format('H:i');
                            $hora_atual = \Carbon\Carbon::parse($hora)->format('H:i');

                            return $dia_escala == $dia_atual && $hora_escala == $hora_atual;
                        });
                    @endphp

                    @if($escala_ed)
                        {{ optional($escala_ed->jornalista)->nome_completo ?? '---' }}
                    @else
                        ==
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody>

    
</table>



@endsection