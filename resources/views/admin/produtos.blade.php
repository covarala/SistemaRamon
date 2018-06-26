@extends('admin.comuns.layout')
@section('conteudo')
<style media="screen">
  #titulo{
    background-color: #0d823b;
    color: #fff;
  }
</style>
      <div class="title" id="titulo">
        <div class="row">
          <div class="col-md-12 col-md-offset-4">
            <h2><br>Produtos Cadastrados</h2>
            <br>

          </div>
        </div>
      </div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover order-column">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>

    </tr>
  </thead>
  <tbody>
    <?php $cont = 1; ?>
      @foreach ($produtos as $produto)
      <tr>
        <th>{{ $cont }}</th>
        <th>{{ $produto->nome }}</th>
        <th>{{ $produto->descricao }}</th>
        <th>
          <a href="{{ route('excluir.produto', $produto->id) }}" class="btn btn-danger  active" onclick="return confirm('Você tem certeza que deseja excluir? Ao excluir não será possível recuperá-lo.')" > Excluir <i class="fa fa-trash-o fa-lg" aria-hidden="true"</a>
          <a href=>Editar
        </th>
      </tr>
      <?php $cont++; ?>
      @endforeach

  </tbody>
</table>
  </div>
@endsection
