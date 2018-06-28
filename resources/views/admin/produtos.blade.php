@extends('admin.comuns.layout')
@section('conteudo')
<style media="screen">
  #titulo{
    background-color: #0d823b;
    color: #fff;
  }
</style>
<div class="col-md-12 col-md-offset-4">
  <h2><br>Produtos Cadastrados</h2>
  <br>
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover order-column">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Valor</th>
      <th scope="col">Ações</th>

    </tr>
  </thead>
  <tbody>
    <?php $cont = 1; ?>
      @foreach ($produtos as $produto)
      <tr>
        <th>{{ $cont }}</th>
        <th>{{ $produto->nome }}</th>
        <th>{{ $produto->descricao }}</th>
        <th>
          @foreach ($valorProdutos as $valorProduto)
            @if($valorProduto->idProduto === $produto->idProduto)
              {{ $valorProduto->valor }}
            @endif
          @endforeach
        </th>
        <th>
          <a  class="btn btn-xs btn-sucess"  data-toggle="modal" data-target="#editarModal">Editar<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
          <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <div class="register-box">
                    <div class="register-box-body">
                    <form class="form-signin" name="novaSenha" method="POST" action="{{ route('update.produto', $produto->idProduto) }}">
                      {!! csrf_field() !!}

                      <input type="hidden" name="id" value="<?= $produto->idProduto ?>" />

                      <h1 class="h3 mb-3 font-weight-normal" align="center">Atualiza | Produto</h1>

                      <label for="" class="sr-only"></label>
                      <input value="<?= $produto->nome ?>" name="nome" type="text" class="form-control" placeholder="Nome" required autofocus>
                      <label class="sr-only"></label>
                      <input value="<?= $produto->descricao ?>" name="emailSistema" type="email"  class="form-control" id="" placeholder="Email sistema" required>
                      <label class="sr-only"></label>
                      <input value="<?= $valorProduto->valor ?>" name="emailSistema" type="email"  class="form-control" id="" placeholder="Valor Produto" required>


                    </form>
                  </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary"  type="submit">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <a href="{{ route('exclui.produto', $produto->idProduto) }}" class="btn btn-danger  active" onclick="return confirm('Você tem certeza que deseja excluir? Ao excluir não será possível recuperá-lo.')" > Excluir <i class="fa fa-trash-o fa-lg" aria-hidden="true"</a>

        </th>
      </tr>
      <?php $cont++; ?>
      @endforeach

  </tbody>
</table>
  </div>
@endsection
