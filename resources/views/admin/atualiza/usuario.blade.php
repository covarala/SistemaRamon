@extends('admin.comuns.layout')
@section('conteudo')
<div class="register-box">
  <div class="form-signin">
  <div class="register-box-body">
  <form class="form-signin" name="novaSenha" method="POST" action="{{ route('update.usuario', $usuario->id) }}">
    {!! csrf_field() !!}

    <input type="hidden" name="id" value="<?= $usuario->id ?>" />

    <h1 class="h3 mb-3 font-weight-normal" align="center">Atualizar | Usuario</h1>

    <label for="" class="sr-only"></label>
    <input value="<?= $usuario->nome ?>" name="nome" type="text" class="form-control" placeholder="Nome" required autofocus>
    <label for="" class="sr-only"></label>
    <input value="<?= $usuario->sobrenome ?>" name="sobrenome" type="text" class="form-control" placeholder="Sobrenome" required autofocus>
    <label class="sr-only"></label>
    <input value="<?= $usuario->email ?>" name="email" type="text"  class="form-control" id="" placeholder="Email" >
    <label class="sr-only"></label>
    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha" required>
      @if (session('status-senha'))
      <div class="alert alert-danger">
        {{ session('status-senha') }}
      </div>
      @endif
    <label class="sr-only"></label>
    <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar Senha" required>
      @if (session('status-senha'))
      <div class="alert alert-danger">
        {{ session('status-senha') }}
      </div>
      @endif
      <br>
    <label for="inputTipoUsuario" class="sr-only"></label>
    <select id="inputTipoUsuario" name="tipoUsuario" class="form-control">
      <option value="admin">Administrador</option>

    </select>
    <br>

    <button class="btn btn-primary btn-block"type="submit" name="button">Atualizar</button>


  </form>
</div>
</div>


@endsection
