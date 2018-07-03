@extends('distribuidor.comuns.layout')

@section('conteudo')
<br>
<div class="container col-sm-7">
  <div class="row">
<div class="container-fluid">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover order-column">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Quantidade de orçamentos efetuados</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $cont = 1;
             $idRepetido = -1;
             ?>
            @foreach ($orcamentosRecebidos as $orcamentoRecebido => $value)
              @if($idRepetido !== $value->idEmissor || $idRepetido === -1)
                <?php $idRepetido = $value->idEmissor; ?>
                  <tr>
                    <th>{{ $cont }}</th>
                      <th>{{ $value->nome }}</th>
                      <th>{{ $value->email }}</th>
                      <th>{{ $value->qntOrcPed}}</th>
                    </tr>
                <?php $cont++; ?>
              @endif
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
