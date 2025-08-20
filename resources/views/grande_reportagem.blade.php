@extends('layout.admin')

@section('title')
    GR
@endsection

@section('table')
    Grande reportagem

    @if (session('reportagem'))
        <div class="alert alert-success">
            {{session('reportagem')}}
        </div>
        
    @endif
    
@endsection


@section('content')

    @section('table')
        Grande reportagem       
    @endsection

    <div class="form-floating mb-3">
        <div class="mb-3">

                  
                <a href="{{route('logged')}}" class="btn btn-primary">Voltar</a>
            
            </div>
        <form action="{{route('grandereportagem')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
    
                <select name="jornalista_id" class="form-control">
                    <option value="">Selecione o Jornalista</option>
                    @foreach ($reportagem as $jornalista)
                        <option value="{{$jornalista->id}}">{{$jornalista->nome_completo}}</option>
                        
                    @endforeach
                </select>
            </div>



            <div class="input-group mb-3">
                <span class="input-group-text">Tema da reportagem</span>
                <input type="text" class="form-control" name="tema" placeholder="Tema da reportagem">
                <span class="input-group-text">Mes e ano</span>
                <input type="text" class="form-control" name="mes_ano" placeholder="Mes e ano de producao">
                
            </div>


            

            <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>
        



            

        </form>
    </div>
    
@endsection