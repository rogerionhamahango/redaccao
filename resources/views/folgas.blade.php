@extends('layout.admin')

@section('title')
    Registar Folga
@endsection

@section('content')

<div class="container mt-3">

    <h4>Registar Folga</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('registar_folga') }}" method="POST">
        @csrf

        {{-- Jornalista --}}
        <div class="mb-3">
            
            <select name="jornalista_id" class="form-control">
                <option value="">Selecione o jornalista</option>

                @foreach($jornalistas as $jornalista)
                    <option value="{{ $jornalista->id }}">
                        {{ $jornalista->abreviatura }}
                    </option>
                @endforeach
            </select>

           
        <br>
        
        <div class="input-group mb-3">
            <span class="input-group-text">Dia da Folga</span>
            <input type="date" name="dia" class="form-control">

                            <span class="input-group-text">Dia da semana</span>
                 <select name="dia_semana" class="form-control">
                    <option value="">Selecione o dia da semana</option>
                    <option value="segunda" >Segunda-feira</option>
                    <option value="terça" >Terça-feira</option>
                    <option value="quarta">Quarta-feira</option>
                    <option value="quinta" >Quinta-feira</option>
                    <option value="sexta" >Sexta-feira</option>
                    <option value="sábado" >Sábado</option>
                    <option value="domingo" >Domingo</option>
                </select>


           
        </div>

        {{-- Botões --}}

        <a href="{{route('emissaolog')}}" class="btn btn-primary">
            Voltar
        </a>
        <button type="submit" class="btn btn-danger">
            Registar Folga
        </button>

        

    </form>

</div>

@endsection