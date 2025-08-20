@extends('layout.admin')

@section('title')
    jornalista    
@endsection

@section('table')
    Campo de cadastro de Locutores e jornalistas

            @if(session('jornalista'))
                <div class="alert alert-success">
                    {{ session('jornalista') }}
                </div>
            @endif

            @if (session('nuit'))
                <div class="alert alert-danger">
                {{session('nuit')}}
                </div>
            @endif

@endsection
    


@section('content')
    <fieldset>
        <div>
            <form action="{{route('gravar_jornalista')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
    
                <input type="text" name="nome_completo" class="form-control"  placeholder="name@example.com">
                <label  class="form-label">Nome completo</label>
                     @error('nome_completo')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                        @enderror
            </div>

             <div class="form-floating mb-3">
    
                <select name="genero"  class="form-select">
                    <option value="">  Indique o genero  </option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Outro">Outro</option>
                </select>

                    @error('genero')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
            </div>

            <div class="form-floating mb-3">
    
                <input type="text" name="nuit" class="form-control"  placeholder="name@example.com">
                <label  class="form-label">NUIT</label>
                        @error('nuit')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                        @enderror
            </div>

            <div class="form-floating mb-3">
    
                <input type="date" class="form-control" name="data_admissao" placeholder="name@example.com">
                <label  class="form-label">Data de admissao</label>

                     @error('data_admissao')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                    @enderror
            </div>

            <div class="form-floating mb-3">
    
                <input type="text" class="form-control" name="celular_principal" placeholder="name@example.com">
                <label  class="form-label">Celular Principal</label>
                    @error('celular_principal')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                   @enderror
            </div>

            <div class="form-floating mb-3">
    
                <input type="text" class="form-control" name="celular_alternativo"  placeholder="name@example.com">
                <label  class="form-label">Celular alternativo</label>
                    @error('celular_alternativo')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                   @enderror
            </div>

            <div class="form-floating mb-3">
    
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label  class="form-label">Email</label>
                 @error('email')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                   @enderror
            </div>

            <div class="form-floating mb-3">
    
                <select name="carreira" class="form-control">
                    <option value="">Indique a sua carreira</option>
                    <option value="Locutor">Locutor</option>
                    <option value="Jornalista">Jornalista</option>
                    <option value="Locutor e Jornalista">Locutor e Jornalista</option>
                </select>
                    @error('carreira')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                     @enderror
            </div>

            

            <div class="form-floating mb-3">
    
                <input type="text" class="form-control" name="linguas_car" placeholder="name@example.com">
                <label  class="form-label">Linguas na sua careira</label>
                    @error('linguas_car')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                   @enderror
            </div>

             <div class="form-floating mb-3">
    
                <input type="text" class="form-control" name="categoria_actual" placeholder="name@example.com">
                <label  class="form-label">Categoria actual</label>
                 @error('categoria_actual')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                   @enderror
            </div>
            <div class="form-floating mb-3">
    
                 <select name="redacao_de" class="form-select">
                    <option value="">Afecto ao sector de producao de ...</option>
                    <option value="Maputo">EPM</option>
                    <option value="Gaza">EPG</option>
                    <option value="Inhambane">EPI</option>
                    <option value="Manica">EPMN</option>
                    <option value="Sofala">EPS</option>
                    <option value="Tete">EPT</option>
                    <option value="Zambezia">EPZ</option>
                    <option value="Nampula">EPN</option>
                    <option value="Cabo Delgado">EPCD</option>
                    <option value="Niassa">EPNI</option>
                    <option value="Antena Nacional">Antena Nacional</option>
                    <option value="Radio Cidade">Rádio Cidade</option>
                    <option value="RM Desporto">RM Desporto</option>
                    <option value="Maputo Coridor Radio">Maputo Coridor Radio</option>
                    <option value="Sede">Sede</option>
                </select>
                    @error('redacao_de')

                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
        
                   @enderror
               
            </div>

           

           


          

            <div class="form-floating mb-3">
                <button type="reset" class="btn btn-primary">Cancelar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </div>
            </form>    
        </div>    
    </fieldset>    
@endsection