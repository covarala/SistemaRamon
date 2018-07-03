@extends('admin.comuns.layout')
@section('conteudo')
<style media="screen">
  #titulo{
    background-color: #0d823b;
    color: #fff;
  }
</style>
      <div class="col-md-12 col-md-offset-4">
        <h2><br>Distribuidores Cadastrados</h2>
        <a type="button" href="{{ route('view.juridicas.cadastradas') }}"  id="cadEvento" class="btn btn-success btn-lg py-1 offset-10">Cadastrar novo</a>
        <br>
        <br>
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
              <th scope="col">Telefone</th>
              <th scope="col"> Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php $cont = 1; ?>
            @foreach ($distribuidores as $distribuidor)
            <tr>
              <th>{{ $cont }}</th>
              <th>{{ $distribuidor->nome }}</th>
              <th>{{ $distribuidor->email }}</th>
              <th>

                @foreach ($telefones as $telefone => $value)
                @if($distribuidor->nome === $value['nome'])
                {{ $value->telefone.' / ' }}
                @endif
                @endforeach
              </th>
              <th>
                <a href="{{ route('view.juridicas.cadastradas') }}" class="btn btn-primary btn-xs active"  >Editar<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                </th>
            </tr>
            <?php $cont++; ?>
            @endforeach

          </tbody>
        </table>
      </div>

@endsection
