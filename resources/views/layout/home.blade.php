<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
         <link rel="icon" href="{{ asset('RadioMocambique.ico') }}" >
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])  
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Data e Hora: {{\Carbon\Carbon::now()->format('d-m-Y H:i')}}</a>
            <!-- Sidebar Toggle-->
            
            <!-- Navbar Search-->
           
        </nav>
        <div id="layoutSidenav">
            
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
                            <div>
                                <strong>
                                    <a href="#" style="text-decoration: none" class="text-dark">Radio Mocambique, hoje e sempre projectando Mocambique</a>
                                &middot;
                                <a href="#" style="text-decoration: none" class="text-dark">RJNH a Sua solucao digital</a>
                                </strong>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>