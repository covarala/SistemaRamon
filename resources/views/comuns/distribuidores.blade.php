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

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>

  </div>
</div>


@endsection
