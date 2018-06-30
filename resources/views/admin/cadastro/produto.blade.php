@extends('admin.comuns.layout')
@section('conteudo')
<div class="register-box">
  <div class="form-signin">
  <div class="register-box-body">
  <form enctype="multipart/form-data" class="form-signin" name="novaSenha" method="POST" action="{{ route('cadastro.produto') }}" >
    {!! csrf_field() !!}

    <input type="hidden" name="id" value="" />

    <h1 class="h3 mb-3 font-weight-normal" align="center">Cadastra | Produto</h1>

    <label for="" class="sr-only">Nome</label>
    <input value="" name="nome" type="text" class="form-control" placeholder="Nome" required autofocus>
    <label class="sr-only"></label>
    <input value="" name="descricao" type="text"  class="form-control" id="" placeholder="Descrição " >

    <label class="sr-only"></label>
    <input value="" name="valorProduto" type="text"  class="form-control" id="" placeholder="Valor Produto" required>

    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem"/>

    <br>
    <br>

    <button class="btn btn-primary btn-block"type="submit" name="button">Cadastrar</button>


  </form>
</div>
</div>


@endsection
