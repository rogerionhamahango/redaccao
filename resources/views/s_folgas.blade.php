@extends('layout.home')

@section('title')
    Folgas semanais
@endsection


@section('table')
    Folgas semanais
    
@endsection


@section('content')
<!-- Botao voltar -->
    <div class="mb-3">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </div>
    

    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Dia</th>
            <th>Data</th>
            <th>Folgas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dias as $dia)
            <tr>
                <td>{{ $dia->translatedFormat('l') }}</td>
                <td>{{ $dia->format('d-m-Y') }}</td>
                <td>
                    @if(isset($folgas[$dia->format('Y-m-d')]))
                        @foreach($folgas[$dia->format('Y-m-d')] as $folga)
                            <span class="badge bg-danger">
                                {{ $folga->jornalista->abreviatura }}
                            </span>
                        @endforeach
                    @else
                        <span class="text-muted">Sem folgas</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


    
@endsection

