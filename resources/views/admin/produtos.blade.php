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
  <a type="button" href="{{ route('view.cadastro.produto') }}"  id="cadEvento" class="btn btn-success btn-lg py-1 offset-10">Cadastrar novo</a>
  <br>
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
        <th>{{ $produto->valor }}</th>
        <th>
          <a href="{{ route('atualiza.produto', $produto->id) }}" class="btn btn-primary btn-block active"  >Editar<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
          <a href="{{ route('exclui.produto', $produto->idProduto) }}" class="btn btn-danger btn-block active" onclick="return confirm('Você tem certeza que deseja excluir? Ao excluir não será possível recuperá-lo.')" > Excluir <i class="fa fa-trash-o fa-lg" aria-hidden="true"</a>

        </th>
      </tr>
      <?php $cont++; ?>
      @endforeach

  </tbody>
</table>
  </div>
@endsection
