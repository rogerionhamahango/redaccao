@extends('layout.admin')

@section('title')
    Emissoes
@endsection


@section('content')

    @section('table')
        Regista a emissao
        @if(session('emissao'))
            <div class="alert alert-success">
                {{session('emissao')}}
             </div>
            
        @endif    
    @endsection

    <div class="form-floating mb-3">
            <div class="mb-3">

                  
                <a href="{{route('emissaolog')}}" class="btn btn-primary">Voltar</a>
            
            </div>
        <form action="{{route('emissao_loc')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                 <select name="locutor_id" class="form-control" >
                    <option value="">Selecione o Locutor/ Jornalista</option>
                    @foreach ($dados ?? [] as $produtor)
                        <option value="{{$produtor->id}}">{{$produtor->nome_completo}}</option>
                        
                    @endforeach
                 </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Emissao</span>
                <input type="text" name="lingua" class="form-control">
                <span class="input-group-text">Hora inicio</span>
               <select name="hora_inicial" class="form-control">
                <option value="">Hora inicial</option>
                <option value="4h30">4h30</option>
                <option value="9h55">9h55</option>
                <option value="13h55">13h55</option>
                <option value="18h55">18h55</option>
                <option value="0h00">0h00</option>
               </select>
                <span class="input-group-text" >Hora final</span>
                <select name="hora_final" class="form-control">
                    <option value="">Hora final</option>
                    <option value="9h55">9h55</option>
                    <option value="13h55">13h55</option>
                    <option value="18h55">18h55</option>
                    <option value="0h30">0h30</option>
                    <option value="4h55">4h55</option>
                </select>
                <span class="input-group-text">Data</span>
                <input type="date" name="dia" class="form-control">
                
                <span class="input-group-text">Data</span>
                 <select name="dia_semana" class="form-control">
                    <option value="">Indique o dia da semana</option>
                    <option value="Segunda">Segunda-Feira</option>
                    <option value="Terca">Terca-Feira</option>
                    <option value="Quarta">Quarta-Feira</option>
                    <option value="Quinta">Quinta-Feira</option>
                    <option value="Sexta">Sexta-Feira</option>
                    <option value="Sabado">Sabado</option>
                    <option value="Domingo">Domingo</option>
                </select>
                
            </div>

            

                  <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>
           

        </form>
    </div>
    
@endsection