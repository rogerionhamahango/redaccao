@extends('layout.home')

@section('title')
    jornalista e locutores
@endsection

@section('table')
    Jornalistas e Locutores registados
@endsection

@section('content')
<!-- Botao voltar -->
    <div class="mb-3">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </div>

    <table class="table table-bordered">
        <tr class="table-danger">
            <th>Nome</th>
            <th>Genero</th>
            <th>Celular_1</th>
            <th>Celular_2</th>
            <th>E-Mail</th>
            <th>Carreira</th>
            <th>Linguas</th>
            <th>Categoria</th>
            <th>Redacao de</th>
            @foreach ($jornalistas as $jornalista)
            <tr>
                <th>{{$jornalista->nome_completo}}</th>
                <th>{{$jornalista->genero}}</th>
                <th>{{$jornalista->celular_principal}}</th>
                <th>{{$jornalista->celular_alternativo}}</th>
                <th>{{$jornalista->email}}</th>
                <th>{{$jornalista->carreira}}</th>
                <th>{{$jornalista->linguas_car}}</th>
                <th>{{$jornalista->categoria_actual}}</th>
                <th>{{$jornalista->redacao_de}}</th>
            </tr>
                
            @endforeach
        </tr>



    </table>
    
@endsection