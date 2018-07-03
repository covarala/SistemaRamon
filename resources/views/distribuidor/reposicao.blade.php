@extends('distribuidor.comuns.layout')

@section('conteudo')
<br>
<div class="container col-sm-7">
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
            @if(isset($orcamento))
            <div class="alert alert-info">
              <h6 class="text offset-sm-1 py-4 text-success font-weight-bold">Preço orçamentado de cada produto:</h6>
              <form class="offset-sm-1" action="{{ route('efetivacao.orcamento.distribuidor') }}" method="post">
                <?php
                $total = $orcamento['total'];
                $separado = $orcamento['separado'];

                $sessao = session()->all();
                ?>
                {!! csrf_field() !!}
                @foreach ($qntProdutos as $qntProduto => $valor)
                <input type="hidden" name="{{$qntProduto.'Qnt'}}" value="{{$valor}}">
                @endforeach

                @foreach ($separado as $key => $value)
                <div class="form-group row">
                  <label for="inputPassword" class="col-form-label">{{$key}}: R$ {{number_format($value, 2, ',', '.')}}</label>
                  <input type="hidden" name="{{$key.'Valor'}}" value="{{$value}}">
                </div>
                @endforeach
                <div class="form-group row">

                  <label for="inputPassword" class="col-form-label font-weight-bold">Valor Total: R$ {{number_format($total, 2, ',', '.')}}</label>
                  <input type="hidden" name="total" value="{{$total}}">
                  <input type="hidden" name="idUserPed" value="{{$sessao['id']}}">
                  <input type="hidden" name="idUserRec" value="{{$idRecebedor['idUser']}}">
                  <input type="hidden" name="idJuridica" value="{{$idRecebedor['idJuridica']}}">
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Efetivar Orçamento</button>
                </div>
              </form>
        </div>
          @else
      <h6 class="text offset-sm-1 py-4 text-success font-weight-bold">Informe a quantidade desejada de cada produto:</h6>
      <form class="offset-sm-1" action="{{route('form.reposicao')}}" method="post">
        {!! csrf_field() !!}
        <div class="form-group row">
          <label for="inputPassword" class="col-form-label">Individual</label>
          <div class="col-sm-2">
            <input name="individual" type="number" min="0" max="400" class="form-control" placeholder="Qtd">
          </div>
          <label for="inputPassword" class="col-form-label">SM</label>
          <div class="col-sm-2">
            <input min="0" max="56" name="sm" type="number" class="form-control" placeholder="Qtd">
          </div>
          <label for="inputPassword" class="col-form-label">Display</label>
          <div class="col-sm-2">
            <input min="0" max="32" name="display" type="number" class="form-control" placeholder="Qtd">
          </div>
        </div>
        <h6 class="text justify-content-start py-4 ">Tipos de Caixa Master:</h6>
        <div class="form-group row">
          <label for="inputPassword" class="col-form-label">Individual</label>
          <div class="col-sm-2">
            <input min="0" name="caixaMasterIndividual" type="number" class="form-control" placeholder="Qtd">
          </div>
          <label for="inputPassword" class="col-form-label">SM</label>
          <div class="col-sm-2">
            <input min="0" name="caixaMasterSm" type="number" class="form-control" placeholder="Qtd">
          </div>
          <label for="inputPassword" class="col-form-label">Display</label>
          <div class="col-sm-2">
            <input min="0" name="caixaMasterDisplay" type="number" class="form-control" placeholder="Qtd">
          </div>
        </div>
        <div class="container col-sm-7">
          <br>
        <ul class="nav justify-content-end">
          <button type="submit" class="btn btn-success justify-content-end" >Continuar</button>
        </ul>
      </div>
      </div>
      <br><br><br><br><br><br>
  </form>
  @endif
</div>

@endsection
