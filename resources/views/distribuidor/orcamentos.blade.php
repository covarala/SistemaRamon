@extends('distribuidor.comuns.layout')

@section('conteudo')



<div class="container-fluid">
  <br>
  <div class="row">
    <!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">-->
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
    <!--</main>-->
  </div>
</div>


@endsection
