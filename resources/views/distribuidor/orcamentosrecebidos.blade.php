@extends('distribuidor.comuns.layout')

@section('conteudo')
<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover order-column">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Número do orcamento</th>
              <th scope="col">Ações</th>
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
                {{ $value->idOrcamento }}
              </th>
              <th>
                <a href="{{ route('view.juridicas.cadastradas') }}" class="btn btn-primary btn-xs active"  >Editar<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                <a href="{{ route('exclui.distribuidor', $value->id) }}" class="btn btn-xs btn-danger"  onclick="return confirm('Você tem certeza que deseja excluí-lo(a)? Essa ação não o excluirá da base de dados!')">Excluir</a>
              </th>
            </tr>
            <?php $cont++; ?>
            @endforeach

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


@endsection
