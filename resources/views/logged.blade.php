@extends('layout.admin')

@section('title')
emissoes    
@endsection

@section('table')
    Sector de Redacao
@endsection

@section('botao')

  


    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opcoes</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a href="{{route('redacao')}}" class="dropdown-item">Agenda da Redacao</a></li>
                        <li><a href="{{route('noticiarioJornais')}}" class="dropdown-item">Edicoes da semana</a></li>
                       <li><a href="{{route('grande_reportagem')}}" class="dropdown-item">Grande Reportagem</a></li>
                        <li><a href="{{route('jornalista')}}" class="dropdown-item">Registar Jornalista ou Locutor</a></li>
                        <li><a href="{{route('agendado')}}" class="dropdown-item">Actividades agendadas</a></li>
                        
                    </ul>
                </li>
            </ul>
    
@endsection


@section('content')
    Historial
@endsection