@extends('distribuidor.comuns.layout')

@section('conteudo')

<div class="container-fluid">
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
      </div>
    <button type="submit" class="btn btn-success" >Continuar</button>
  </form>
</div>

@endsection
