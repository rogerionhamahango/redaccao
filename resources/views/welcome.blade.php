<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
         <link rel="icon" type="image/x-icon" href="/RadioMocambique.ico" />

        <title>Redaccao</title>
       
        @vite(['resources/css/app.css', 'resources/js/app.js'])        
    </head>
    <body class="bg-light" >
        <div id="layoutAuthentication"><br><br><br><br>
            <div id="layoutAuthentication_content">
                <main >
                    <div class="container" >
                        <div class="row justify-content-center" >
                            <div class="col-lg-5" >
                                <div class="card shadow-lg border-danger flat mt-5" >
                                    <div class="card-header" style="text-align: center;">
                                        <img src="/RadioMocambique.png " alt="Logo da Radio Mocambique" width="80" height="80">
                                    </div>
                                    <div class="card-body" >
                                        @if(session('errado'))
                                            <div class="alert alert-danger">
                                                {{ session('errado') }}
                                            </div>  
                                        @endif    
                                        
                                        <form method="POST" action="{{route('logar')}}" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="nome_utilizador" placeholder="name@example.com" />
                                                <label for="inputEmail">Nome de utilizador</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="senha" placeholder="Password" />
                                                <label for="inputPassword">Senha</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#" style="text-decoration:none; color:black;">Esqueceu a senha?</a>
                                                <button type="submit" class="btn btn-danger btn-lg">Entrar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer bg-danger text-center py-3">
                                        <div class="small"><a href="{{route('home')}}" style="text-decoration: none; color:aliceblue; ">Plataforma da Redaccao</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
