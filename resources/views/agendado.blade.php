@extends('layout.admin')


@section('title')
    Agendado
    
@endsection

@section('table')
Trabalhos agendados    
@endsection



@section('content')

<div class="mb-3">

                  
                <a href="{{route('logged')}}" class="btn btn-primary">Voltar</a>
            
            </div>
    <div>
        <select name="" id="">
            <option value="">Selecione o destacado</option>
            @foreach ($agendado ?? [] as $actividade)
                <option value="{{$actividade->nome_completo}}">{{$actividade->id}}</option>                
            @endforeach    
        </select>    
    </div>    
@endsection



