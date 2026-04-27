@extends('layout.home')

@section('title')
    Jornalista & Locutores
@endsection

@section('table')
    Jornalistas e Locutores registados
@endsection

@section('content')

<div class="mb-3">
    <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
</div>

<table class="table table-bordered">

    <thead class="bg-danger">
        <tr>
            <th>Nome</th>
            <th>Genero</th>
            <th>Celular_1</th>
            <th>Celular_2</th>
            <th>E-Mail</th>
            <th>Carreira</th>
            <th>Linguas</th>
            <th>Categoria</th>
            <th>Anos de serviço</th>
            <th>Remanescente</th>
            <th>Redação de</th>
        </tr>
    </thead>

    <tbody class="table-warning">
        @foreach ($jornalistas as $jornalista)
            <tr>
                <td class="fw-bold">{{ $jornalista->nome_completo }}</td>
                <td>{{ $jornalista->genero }}</td>
                <td>{{ $jornalista->celular_principal }}</td>
                <td>{{ $jornalista->celular_alternativo }}</td>
                <td>{{ $jornalista->email }}</td>
                <td>{{ $jornalista->carreira }}</td>
                <td>{{ $jornalista->linguas_car }}</td>
                <td>{{ $jornalista->categoria_actual }}</td>
                <td class="text-center bg-info">{{ (int) $jornalista->tempo_servico }}</td>
                <td class="text-center bg-success">{{ (int) $jornalista->anos_faltantes }}</td>
                <td class="text-center">{{ $jornalista->redacao_de }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection