@extends('admin.comuns.layout')

@section('conteudo')

<div class="col-md-12 col-md-offset-4">
  <h2><br>Distribuidores Cadastrados</h2>
  <br><br>
</div>
@if (session('status'))
<div class="alert alert-info">
  {{ session('status') }}
</div>
@endif


<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover order-column">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Quantidade de orçamentos recebidos</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php $cont = 1; ?>
      @foreach ($distribuidores as $distribuidor)
      <tr>
        <th>{{ $cont }}</th>
        <th>{{ $distribuidor->nome }}</th>
        <th>{{ $distribuidor->email }}</th>
        <th>{{ $distribuidor->qntOrcRec }}</th>
        <th>
          <a href="{{ route('view.visao.distribuidor', $distribuidor->idUser) }}" class="btn btn-primary btn-xs active"  >Visualize orçamentos<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
          </th>
      </tr>
      <?php $cont++; ?>
      @endforeach

    </tbody>
  </table>
</div>


@endsection
