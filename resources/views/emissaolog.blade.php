@extends('layout.admin')

@section('title')
emissoes    
@endsection

@section('table')
    Sector de emissoes.
@endsection

@section('botao')

  


    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opcoes</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a href="{{route('emissao')}}" class="dropdown-item">Registo de emissao</a></li>
                       <li><a href="{{route('programa')}}" class="dropdown-item">Registo de Programa</a></li>
                        <li><a href="{{route('jornalista')}}" class="dropdown-item">Registar Jornalista ou Locutor</a></li>
                        
                        
                    </ul>
                </li>
            </ul>
    
@endsection


@section('content')
    Historial
@endsection