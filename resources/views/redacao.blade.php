@extends('layout.admin')

@section('title')
    redacao
@endsection


@section('content')

    @section('table')
        Agenda da redacao    
        
        @if(session('agendado'))
            <div class="alert alert-success">
                {{session('agendado')}}
            </div>
        @endif


        @if(session('nao_agendado'))
            <div class="alert alert-danger">
                {{session('nao_agendado')}}
            </div>
        @endif
    @endsection

    <div class="form-floating mb-3">
        <div class="mb-3">

                  
                <a href="{{route('logged')}}" class="btn btn-primary">Voltar</a>
            
            </div>
        <form action="{{route('agenda')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <select name="jornalista_id" class="form-select form-select-lg mb-3" >
                    <option value="">Seleciona o trabalhador</option>
                    
                    @forelse ($dados ?? [] as $incumbido)

                        <option value="{{$incumbido->id}}">{{$incumbido->nome_completo}}</option>

                    @empty

                        
                    <p>Nenhum registo enconcontrado</p>   
                        
                    @endforelse
                </select>

            </div>



            <div class="input-group mb-3">
                <span class="input-group-text">Data</span>
                <input type="date" name="data" class="form-control">
                <span class="input-group-text">Agenda do dia</span>
                <input type="text" name="agenda" class="form-control">
                
            </div>


            


            <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>



            

        </form>
    </div>
    
@endsection