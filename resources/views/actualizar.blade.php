@extends('layout.admin')

@section('title')
    Emissoes
@endsection


@section('content')

    @section('table')
        Regista a emissao
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
             </div>
            
        @endif    
    @endsection

    <div class="form-floating mb-3">
            <div class="mb-3">

                  
                <a href="{{route('actualizar_escala')}}" class="btn btn-primary">Voltar</a>
            
            </div>
        <form action="{{route('actualizarEscala', $escala->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                 <select name="locutor_id" class="form-control" >
                    <option value="">Selecione o Locutor/ Jornalista</option>
                    @foreach ($locutores ?? [] as $locutor)
                        <option value="{{$locutor->id}}"
                            {{$escala->locutor_id == $locutor->id ? 'selected' : ''}}>
                            {{$locutor->abreviatura }}
                        </option>
                        
                    @endforeach
                 </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Hora inicio</span>
               <select name="hora_inicial" class="form-control">
                    <option value="">Hora inicial</option>
                    <option value="09:55" {{ date('H:i', strtotime($escala->hora_inicial)) == '09:55' ? 'selected' : '' }}>09:55</option>
                    <option value="13:55" {{ date('H:i', strtotime($escala->hora_inicial)) == '13:55' ? 'selected' : '' }}>13:55</option>
                    <option value="18:55" {{ date('H:i', strtotime($escala->hora_inicial)) == '18:55' ? 'selected' : '' }}>18:55</option>
                    <option value="00:00" {{ date('H:i', strtotime($escala->hora_inicial)) == '00:00' ? 'selected' : '' }}>00:00</option>   
                    <option value="04:30" {{ date('H:i', strtotime($escala->hora_inicial)) == '04:30' ? 'selected' : '' }}>04:30</option>
                  
               </select>

                <span class="input-group-text">Hora final</span>
                <select name="hora_final" class="form-control">
                    <option value="">Hora final</option>
                    <option value="09:55" {{ date('H:i', strtotime($escala->hora_final)) == '09:55' ? 'selected' : '' }}>09:55</option>
                    <option value="13:55" {{ date('H:i', strtotime($escala->hora_final)) == '13:55' ? 'selected' : '' }}>13:55</option>
                    <option value="18:55" {{ date('H:i', strtotime($escala->hora_final)) == '18:55' ? 'selected' : '' }}>18:55</option>
                    <option value="00:30" {{ date('H:i', strtotime($escala->hora_final)) == '00:30' ? 'selected' : '' }}>00:30</option>
                    <option value="04:55" {{ date('H:i', strtotime($escala->hora_final)) == '04:55' ? 'selected' : '' }}>04:55</option>
                </select>
                    
                
                <span class="input-group-text">Data</span>
                <input type="date" name="dia" class="form-control" value="{{ $escala->dia }}">
                
                <span class="input-group-text">Dia da semana</span>
                 <select name="dia_semana" class="form-control">
                    <option value="segunda" {{ $escala->dia_semana == 'segunda' ? 'selected' : '' }}>Segunda-feira</option>
                    <option value="terça" {{ $escala->dia_semana == 'terça' ? 'selected' : '' }}>Terça-feira</option>
                    <option value="quarta" {{ $escala->dia_semana == 'quarta' ? 'selected' : '' }}>Quarta-feira</option>
                    <option value="quinta" {{ $escala->dia_semana == 'quinta' ? 'selected' : '' }}>Quinta-feira</option>
                    <option value="sexta" {{ $escala->dia_semana == 'sexta' ? 'selected' : '' }}>Sexta-feira</option>
                    <option value="sábado" {{ $escala->dia_semana == 'sábado' ? 'selected' : '' }}>Sábado</option>
                    <option value="domingo" {{ $escala->dia_semana == 'domingo' ? 'selected' : '' }}>Domingo</option>
                </select>
                
            </div>

            

                  <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>
           

        </form>
    </div>
    
@endsection