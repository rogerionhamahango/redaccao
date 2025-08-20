@extends('layout.admin')

@section('title')
    Programas
@endsection


@section('content')

    @section('table')
        Programas 

        @if(session('nao'))
            <div class="alert alert-danger">
                {{session('nao')}}
            </div>
        @endif

        @if (session('programa'))
                <div class="alert alert-success">
                    {{session('programa')}}

                </div>
            
        @endif

    @endsection

    <div class="form-floating mb-3">
        <div class="mb-3">

                  
                <a href="{{route('emissaolog')}}" class="btn btn-primary">Voltar</a>
            
            </div>
        <form action="{{route('programa_cadastro')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                 <select name="produtor_id" class="form-control" >
                    <option value="">Selecione o Locutor/ Jornalista</option>
                    @forelse ($dados ?? [] as $produtor)
                        <option value="{{$produtor->id}}">{{$produtor->nome_completo}}</option>

                        @empty
                            <p>Nenhum registo</p>
                        
                    @endforelse
                 </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Programa</span>
                <input type="text" name="programa" class="form-control">
                <span class="input-group-text">Lingua</span>
                <input type="text" name="lingua" class="form-control">
                <span class="input-group-text">Duracao</span>
                <input type="text" name="duracao" class="form-control">
                <span class="input-group-text">Data de transmissao</span>
                <input type="date" name="data_transmissao" class="form-control">
                 <span class="input-group-text">Data de repeticao</span>
                <input type="date" name="data_repeticao" class="form-control">
            </div>

            <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>
           

        </form>
    </div>
    
@endsection