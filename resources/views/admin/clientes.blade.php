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
            <h2><br>Clientes Cadastrados</h2>
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
      <th scope="col">E-mail</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ações</th>

    </tr>
  </thead>
  <tbody>
    <?php $cont = 1; ?>
      @foreach ($clientes as $cliente)
      <tr>
        <th>{{ $cont }}</th>
        <th>{{ $cliente->nome }}</th>
        <th>{{ $cliente->email }}</th>
        <th></th>
        <th>
          <a href="{{ route('excluir.usuario', $cliente->id) }}" class="btn btn-danger  active" onclick="return confirm('Você tem certeza que deseja excluir? Ao excluir não será possível recuperá-lo.')" > Excluir <i class="fa fa-trash-o fa-lg" aria-hidden="true"</a>
        </th>
      </tr>
      <?php $cont++; ?>
      @endforeach

  </tbody>
</table>
  </div>

@endsection
