@extends('admin.comuns.layout')
@section('conteudo')
<div class="register-box">
  <div class="form-signin">
  <div class="register-box-body">
  <form class="form-signin" method="post" action="{{ route('cadastro.usuario') }}">
    {!! csrf_field() !!}

    <h1 class="h3 mb-3 font-weight-normal" align="center">Cadastra | Usuario</h1>

    <label for="" class="sr-only"></label>
    <input  name="nome" type="text" class="form-control" placeholder="Nome" required autofocus>
    @if (session('status'))
    <div class="alert alert-danger">
      {{ session('status') }}
    </div>
    @endif
    <label for="" class="sr-only"></label>
    <input  name="sobrenome" type="text" class="form-control" placeholder="Sobrenome" required autofocus>
    @if (session('status'))
    <div class="alert alert-danger">
      {{ session('status') }}
    </div>
    @endif
    <label class="sr-only"></label>
    <input  name="email" type="text"  class="form-control" id="" placeholder="Email" >
    @if (session('status'))
    <div class="alert alert-danger">
      {{ session('status') }}
    </div>
    @endif
    <label class="sr-only"></label>
    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha" required>
      @if (session('status-senha'))
      <div class="alert alert-danger">
        {{ session('status-senha') }}
      </div>
      @endif
      @if (session('status'))
      <div class="alert alert-danger">
        {{ session('status') }}
      </div>
      @endif
    <label class="sr-only"></label>
    <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar Senha" required>
      @if (session('status-senha'))
      <div class="alert alert-danger">
        {{ session('status-senha') }}
      </div>
      @endif
      @if (session('status'))
      <div class="alert alert-danger">
        {{ session('status') }}
      </div>
      @endif
      <br>
    <label class="sr-only">Selecione o tipo de usuário</label>
    <select name="tipoUsuario" class="form-control">
      <option  value="admin">Administrador</option>
    </select>
    <br>

    <button class="btn btn-primary btn-block" type="submit" name="button">Cadastrar</button>


  </form>
</div>
</div>


@endsection
