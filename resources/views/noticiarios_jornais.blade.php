@extends('layout.admin')

@section('title')
    redacao
@endsection


@section('content')

    @section('table')
        Edicoes da semana    
        
        @if(session('edicao'))
            <div class="alert alert-success">
                {{session('edicao')}}
            </div>
        @endif


        @if(session('edicao_nao'))
            <div class="alert alert-danger">
                {{session('edicao_nao')}}
            </div>
        @endif
    @endsection

    <div class="form-floating mb-3">
        <div class="mb-3">

                  
                <a href="{{route('logged')}}" class="btn btn-primary">Voltar</a>
            
            </div>
        <form action="{{route('edicoes')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <select name="id_jornalista" class="form-select form-select-lg mb-3" >
                    <option value="">Seleciona o trabalhador</option>
                    
                    @forelse ($noticiarios_jornais ?? [] as $edicao)

                        <option value="{{$edicao->id}}">{{$edicao->nome_completo}}</option>

                    @empty

                        
                    <p>Nenhum registo enconcontrado</p>   
                        
                    @endforelse
                </select>

            </div>



            <div class="input-group mb-3">
                <span class="input-group-text">Data</span>
                <input type="date" name="dia" class="form-control">
                
                <span class="input-group-text">Dia de Semana</span>
                <select name="dia_semana" class="form-control">
                    <option value="">Indique o dia da semana</option>
                    <option value="segunda">Segunda-Feira</option>
                    <option value="terça">Terça-Feira</option>
                    <option value="quarta">Quarta-Feira</option>
                    <option value="quinta">Quinta-Feira</option>
                    <option value="Sexta">Sexta-Feira</option>
                    <option value="sábado">Sabado</option>
                    <option value="domingo">Domingo</option>
                </select>
                        
                <span class="input-group-text">Horas</span>
               <select name="horas" class="form-control">
                <option value="">Horas</option>
                <option value="8:10">8h10 e 9h10</option>
                <option value="12:00">12h e 13h</option>
                <option value="15:00">14h10 as 17h</option>
                <option value="19:00">19h e 22h</option>
                <option value="23:00">Trilingue</option>
                
               </select>

               <span class="input-group-text">Lingua</span>
                <select name="lingua" class="form-control">
                    <option value="">Indique a lingua</option>
                    <option value="Xangana">Xangana</option>
                    <option value="Portugues">Portugues</option>
                    <option value="Cicopi">Chope</option>
                   
                </select>
                
            </div>


            


            <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>



            

        </form>
    </div>
    
@endsection
