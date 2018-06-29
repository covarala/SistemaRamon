@extends('admin.comuns.layout')
@section('conteudo')
<style media="screen">
  #titulo{
    background-color: #0d823b;
    color: #fff;
  }
</style>
<div class="col-md-12 col-md-offset-4">
  <h2><br>Produtos Cadastrados</h2>
  <br>
</div>
<div class="table-responsive">
  <div class="">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
  </div>
<table class="table table-striped table-bordered table-hover order-column">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Valor</th>
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
          @foreach ($valorProdutos as $valorProduto)
            @if($valorProduto->idProduto === $produto->idProduto)
              {{ $valorProduto->valor }}
            @endif
          @endforeach
        </th>
        <th>
          <a href="{{ route('atualiza.produto', $produto->idProduto) }}" class="btn btn-primary  active"  >Editar<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
          <a href="{{ route('exclui.produto', $produto->idProduto) }}" class="btn btn-danger  active" onclick="return confirm('Você tem certeza que deseja excluir? Ao excluir não será possível recuperá-lo.')" > Excluir <i class="fa fa-trash-o fa-lg" aria-hidden="true"</a>

        </th>
      </tr>
      <?php $cont++; ?>
      @endforeach

  </tbody>
</table>
  </div>
@endsection
