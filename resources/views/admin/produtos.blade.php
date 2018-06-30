@extends('admin.comuns.layout')
@section('conteudo')
<style media="screen">
  #titulo{
    background-color: #0d823b;
    color: #fff;
  }
  #cadEvento{
    padding-right: 30px;
    margin-left: 87%;
    margin-right: 20px;
    margin-bottom: 20px;
    background-color: #0d823b;
    color: white;
    border-radius: 4.56px;
  }
</style>



<div class="col-md-12 col-md-offset-4">
  <h2>
    <br>
    Produtos Cadastrados
    <a type="button" href="{{ route('view.cadastro.produto') }}"  id="cadEvento" class="btn btn-outline-primary btn-lg">Cadastrar novo</a>
  </h2>
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
          <a href="{{ route('atualiza.produto', $produto->idProduto) }}" class="btn btn-primary btn-block active"  >Editar<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
          <a href="{{ route('exclui.produto', $produto->idProduto) }}" class="btn btn-danger btn-block active" onclick="return confirm('Você tem certeza que deseja excluir? Ao excluir não será possível recuperá-lo.')" > Excluir <i class="fa fa-trash-o fa-lg" aria-hidden="true"</a>

        </th>
      </tr>
      <?php $cont++; ?>
      @endforeach

  </tbody>
</table>
  </div>
@endsection
