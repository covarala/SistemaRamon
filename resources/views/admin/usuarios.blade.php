@extends('admin.comuns.layout')
@section('conteudo')
<style media="screen">
  #titulo{
    background-color: #0d823b;
    color: #fff;
  }
</style>
      <div class="col-md-12 col-md-offset-4">
        <h2><br> Usuários Cadastrados</h2>
        <a type="button" href="{{ route('view.cadastro.usuario') }}" class="btn btn-success btn-lg py-1 offset-10">Cadastrar novo</a>
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
      <th scope="col">Tipo usuário</th>
      <th scope="col">Ações</th>

    </tr>
  </thead>
  <tbody>
    <?php $cont = 1; ?>
      @foreach ($usuarios as $usuario)
      <tr>
        <th>{{ $cont }}</th>
        <th>{{ $usuario->nome }}</th>
        <th>{{ $usuario->email }}</th>
        <th>{{ $usuario->tipoUsuario }}</th>
        @if($usuario->tipoUsuario === 'admin')
        <th>
          <a href="{{ route('atualiza.usuario', $usuario->id) }}" class="btn btn-primary btn-xs active"  >Editar<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
          <a href="{{ route('exclui.usuario', $usuario->id) }}" class="btn btn-danger btn-xs active" onclick="return confirm('Você tem certeza que deseja excluir? Ao excluir não será possível recuperá-lo.')" > Excluir <i class="fa fa-trash-o fa-lg" aria-hidden="true"</a>
        </th>
        @else
        <th>
            <div class="alert alert-info">
          	Nenhuma ação possível
          </div>
        </th>
        @endif

      </tr>
      <?php $cont++; ?>
      @endforeach

  </tbody>
</table>
  </div>

@endsection
