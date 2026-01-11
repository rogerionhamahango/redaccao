@extends('layout.home')

@section('title')
    home
@endsection

@section('content')

<div class="w-90 h-80  mb-5">

        <a href="{{route('rede')}}" class="btn btn-danger">Entrar</a>
         <a href="{{route('escala')}}" class="btn btn-danger">Escala Semanal</a>
         <a href="{{route('vencida_corrente_futura')}}" class="btn btn-danger">Escala Detalhada</a>
       
         <a href="{{route('escala_edicoes')}}" class="btn btn-danger">Escala Edicoes</a>
        
         <a href="{{route('escala_edicoes')}}" class="btn btn-danger">Escala Regionais</a>         
         <a href="{{route('s_programa')}}" class="btn btn-danger">Programas</a>
         <!--
         <a href="{{route('s_g_reportagem')}}" class="btn btn-danger">Grande Reportagem</a>

            -->
        
         <a href="{{route('s_redacao')}}" class="btn btn-danger">Agenda da Redacao</a>

         <a href="{{route('s_jornalistas')}}" class="btn btn-danger">Locutores e Jornalistas</a>

        <div class="d-flex justify-content-between">
            <div class="p-4 w-50 h-50 mb-3 text-white">
            
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('img/rm2.jpeg')}}" class="d-block w-75" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/rm3.jpeg')}}" class="d-block w-75" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/rm4.jpeg')}}" class="d-block w-75" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/rm1.png')}}" class="d-block w-75" alt="...">
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                </div>




            <div class="p-4 w-50 h-50 mb-3  text-white">
                
            </div>
        </div>

    </div>

    
@endsection