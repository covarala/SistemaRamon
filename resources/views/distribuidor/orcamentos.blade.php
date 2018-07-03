@extends('distribuidor.comuns.layout')

@section('conteudo')



<div class="container-fluid">
  <br>
  <div class="alert alert-info">
    <h4>Os distribuidores visualizam apenas os clientes que fizeram orcamento com eles</h4>
  </div>
  <div class="row">
    <div class="container-fluid">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover order-column">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Número do orcamento</th>
            </tr>
          </thead>
          <tbody>
            <?php $cont = 1; ?>
            @foreach ($orcamentosRecebidos as $orcamentoRecebido => $value)
            <tr>
              <th>{{ $cont }}</th>
              <th>{{ $value->nome }}</th>
              <th>{{ $value->email }}</th>
              <th>
                {{ $value->id }}
              </th>
            </tr>
            <?php $cont++; ?>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
