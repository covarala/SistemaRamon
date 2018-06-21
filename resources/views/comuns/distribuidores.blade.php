@extends('comuns.estatico.layout')
@section('conteudo')
<div class="album py-5 bg-light">
  <div class="container col-md-9  offset-md-auto mb-5">

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php $cont = 1; ?>
        @foreach ($dados as $dado)
        <tr>
          <th scope="row">{{ $cont }}</th>
          <td>{{ $dado->Nome }}</td>
          <td>{{ $dado->Email }}</td>
          <td>{{ $dado->Cidade }}</td>
          <td>{{ $dado->Estado }}</td>
        </tr>
        <?php $cont++; ?>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection
