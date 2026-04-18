@extends('layout.admin')

@section('title')
    Redacao
@endsection


@section('content')

    @section('table')
        Edicoes da semana    
        
        @if(session('atualizada'))
            <div class="alert alert-success">
                {{session('atualizada')}}
            </div>
        @endif

        @if(session('folga'))
            <div class="alert alert-danger">
                {{session('folga')}}
            </div>
        @endif 


        @if(session('nao_atualizada'))
            <div class="alert alert-danger">
                {{session('nao_atualizada')}}
            </div>
        @endif
    @endsection

    <div class="form-floating mb-3">
        <div class="mb-3">

                  
                <a href="{{route('adminsis')}}" class="btn btn-primary">Voltar</a>
            
            </div>
        <form action="{{route('actualizarEscala', ['id' => $edicao->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <select name="id_jornalista" class="form-select form-select-lg mb-3" >
                    <option value="">Seleciona o trabalhador</option>
                    
                    @forelse ($jornalistas ?? [] as $jornalista)

                        <option value="{{$jornalista->id}}"
                            {{$edicao->id_jornalista == $jornalista->id ? 'selected' : ''}}>
                            {{$jornalista->abreviatura}}
                        </option>
                    @empty

                        
                    <p>Nenhum registo enconcontrado</p>   
                        
                    @endforelse
                </select>

            </div>



            <div class="input-group mb-3">
                <span class="input-group-text">Data</span>
                <input type="date" name="dia" class="form-control" value="{{ $edicao->dia }}">
                
                <span class="input-group-text">Dia de Semana</span>
                <select name="dia_semana" class="form-control">
                    <option value="">Indique o dia da semana</option>
                    <option value="segunda" {{ $edicao->dia_semana == 'segunda' ? 'selected' : '' }}>Segunda-Feira</option>
                    <option value="terça" {{ $edicao->dia_semana == 'terça' ? 'selected' : '' }}>Terça-Feira</option>
                    <option value="quarta" {{ $edicao->dia_semana == 'quarta' ? 'selected' : '' }}>Quarta-Feira</option>
                    <option value="quinta" {{ $edicao->dia_semana == 'quinta' ? 'selected' : '' }}>Quinta-Feira</option>
                    <option value="Sexta" {{ $edicao->dia_semana == 'Sexta' ? 'selected' : '' }}>Sexta-Feira</option>
                    <option value="sábado" {{ $edicao->dia_semana == 'sábado' ? 'selected' : '' }}>Sabado</option>
                    <option value="domingo" {{ $edicao->dia_semana == 'domingo' ? 'selected' : '' }}>Domingo</option>
                </select>
                        
                <span class="input-group-text">Horas</span>
               <select name="horas" class="form-control">
                <option value="">Horas</option>
                <option value="08:10" {{ date('H:i', strtotime($edicao->horas)) == '08:10' ? 'selected' : '' }}>8h10 e 9h10</option>
                <option value="12:00" {{ date('H:i', strtotime($edicao->horas)) == '12:00' ? 'selected' : '' }}>12h e 13h</option>
                <option value="15:00" {{ date('H:i', strtotime($edicao->horas)) == '15:00' ? 'selected' : '' }}>14h10 as 17h</option>
                <option value="19:00" {{ date('H:i', strtotime($edicao->horas)) == '19:00' ? 'selected' : '' }}>19h e 22h</option>
                <option value="23:00" {{ date('H:i', strtotime($edicao->horas)) == '23:00' ? 'selected' : '' }}>Trilingue</option>
                
               </select>

               <span class="input-group-text">Lingua</span>
                <select name="lingua" class="form-control">
                    <option value="">Indique a lingua</option>
                    <option value="Xangana" {{ $edicao->lingua == 'Xangana' ? 'selected' : '' }}>Xangana</option>
                    <option value="Portugues" {{ $edicao->lingua == 'Portugues' ? 'selected' : '' }}>Portugues</option>
                    <option value="Cicopi" {{ $edicao->lingua == 'Cicopi' ? 'selected' : '' }}>Chope</option>
                   
                </select>
                
            </div>


            


            <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>



            

        </form>
    </div>
    
@endsection
