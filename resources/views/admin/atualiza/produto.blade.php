@extends('admin.comuns.layout')
@section('conteudo')

<div class="register-box">
  <div class="register-box-body">
  <form class="form-signin" name="novaSenha" method="POST" action="{{ route('update.produto', $produto->idProduto) }}">
    {!! csrf_field() !!}

    <input type="hidden" name="id" value="<?= $produto->idProduto ?>" />

    <h1 class="h3 mb-3 font-weight-normal" align="center">Atualiza | Produto</h1>

    <label for="" class="sr-only"></label>
    <input value="<?= $produto->nome ?>" name="nome" type="text" class="form-control" placeholder="Nome" required autofocus>
    <label class="sr-only"></label>
    <input value="<?= $produto->descricao ?>" name="emailSistema" type="email"  class="form-control" id="" placeholder="Email sistema" required>
    <label class="sr-only"></label>
    <input value="<?= $valorProduto->valor ?>" name="emailSistema" type="email"  class="form-control" id="" placeholder="Valor Produto" required>

    <button class="btn btn-lg btn-primary btn-block"   type="submit" >Atualizar</button>
  </form>
</div>
</div>


@endsection
