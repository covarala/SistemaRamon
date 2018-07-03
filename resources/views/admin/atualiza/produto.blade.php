@extends('admin.comuns.layout')
@section('conteudo')
<div class="register-box">
  <div class="form-signin">
  <div class="register-box-body">
  <form enctype="multipart/form-data" class="form-signin" name="novaSenha" method="POST" action="{{ route('update.produto', $produto->id) }}">

    {!! csrf_field() !!}

    <input type="hidden" name="id" value="<?= $produto->idProduto ?>" />

    <h1 class="h3 mb-3 font-weight-normal" align="center">Atualiza | Produto</h1>

    <label for="" class="sr-only"></label>
    <input value="<?= $produto->nome ?>" name="nome" type="text" class="form-control" placeholder="Nome" required autofocus>
    <label class="sr-only"></label>
    <input value="<?= $valorProduto->valor ?>" name="valorProduto" type="text"  class="form-control" id="" placeholder="Valor Produto" required>

    <textarea name="descricao" type="text"  class="form-control" id="" placeholder="Descrição " id="exampleFormControlTextarea1" rows="3">
      {{$produto->descricao}}
    </textarea>
    <label class="sr-only"></label>
    <br>
    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem"/>
    <br><br>
    <button class="btn btn-primary btn-block py-1"type="submit" name="button">Atualizar</button>


  </form>
</div>
</div>


@endsection
