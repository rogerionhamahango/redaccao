<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('RadioMocambique.ico') }}" >

        @vite(['resources/css/app.css', 'resources/js/app.js'])  
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Data e Hora: {{\Carbon\Carbon::now()->format('d-m-Y H:i')}}</a>

            
           

            <div class="text-center ms-auto dropdown">
                @yield('botao')
            </div>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            
                @if (auth()->check())
                    <strong>{{ auth()->user()->nome_completo }}</strong> 
                @endif
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}"><strong class="text-danger">Logout</strong></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
               
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">@yield('table')</h1>
                        
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 mt-auto bg-danger" >
                    <div class="container-fluid px-4 bd-danger">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-dark "><strong>Copyright &copy; {{\Carbon\Carbon::now()->year}}</strong></div>
                            <div >
                                <strong>
                                    <a href="#" class="text-dark" style="text-decoration: none">Radio Mocambique, hoje e sempre projectando Mocambique</a>
                                &middot;
                                <a href="#" class="text-dark" style="text-decoration: none">RJNH a Sua solucao digital</a>
                                </strong>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>