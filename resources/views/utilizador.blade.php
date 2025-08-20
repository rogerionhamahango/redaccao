@extends('layout.admin')

@section('table')
Registo de novo utilizador

@if(session('email'))
  <div class="alert alert-danger">
    {{session('email')}}
  </div>

@endif
@endsection

@section('content')
@if(@session('success'))
  <div class="alert alert-success">
    {{session('success')}}

  </div>
    
@endif

  <form method="POST" action="{{route('gravar')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-floating mb-3" >
    
    <input type="type" class="form-control" name="nome_completo"  placeholder="name@example.com">
    <label class="form-label">Nome completo</label>
    @error('nome_completo')

    <div class="alert alert-danger">
      {{$message}}
    </div>
        
    @enderror
  </div>

  <div class="form-floating mb-3">
    
    <input type="text" class="form-control" name="nome_utilizador" id="exampleInputPassword1" placeholder="name@example.com">
    <label for="exampleInputPassword1" class="form-label">Nome de utilizador</label>
     @error('nome_utilizador')

    <div class="alert alert-danger">
      {{$message}}
    </div>
        
    @enderror
  </div>

   <div class="form-floating mb-3">
    
    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="name@example.com">
    <label for="exampleInputPassword1" class="form-label">Email</label>
     @error('email')

    <div class="alert alert-danger">
      {{$message}}
    </div>
        
    @enderror
  </div>

  <div class="form-floating mb-3">
    
    <input type="text" class="form-control" name="telefone" id="exampleInputPassword1" placeholder="name@example.com">
    <label for="exampleInputPassword1" class="form-label">Telefone</label>
     @error('telefone')

    <div class="alert alert-danger">
      {{$message}}
    </div>
        
    @enderror
  </div>

  <div class="form-floating mb-3">
    <select name="tipo_utilizador" id="" class="form-control">
      <option value="">Selecione o utilizador</option>
      <option value="Chefe de Redacao">Chefe de Redacao</option>
      <option value="Chefe de Emissoes">Chefe de Emissoes</option>
      <option value="Admin do Sistema">Admin_Sistema</option>
    </select>
     @error('tipo_utilizador')

    <div class="alert alert-danger">
      {{$message}}
    </div>
        
    @enderror
  </div>

  <div class="form-floating mb-3">
   
    <input type="password" class="form-control" name="senha" placeholder="name@example.com" >
     <label for="exampleInputPassword1" class="form-label">Senha de acesso</label>
      @error('senha')

    <div class="alert alert-danger">
      {{$message}}
    </div>
        
    @enderror
  </div>

  <div class="form-floating mb-3">
   
    <input type="password" class="form-control" name="confirmacao" placeholder="name@example.com" >
     <label for="exampleInputPassword1" class="form-label">Confirma a senha</label>
      @error('confirmacao')

    <div class="alert alert-danger">
      {{$message}}
    </div>
        
    @enderror
  </div>

  @if(session('errorsenha'))
    <div class="alert alert-danger">
      {{session('errorsenha')}}
    </div>

  @endif
 
  <button type="submit" class="btn btn-danger">Submeter</button>
</form>


    
@endsection