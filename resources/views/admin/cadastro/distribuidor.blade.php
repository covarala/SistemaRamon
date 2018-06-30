@extends('admin.comuns.layout')
@section('conteudo')
<div class="container">
<div class="register-box">
  <div class="form-signin">

  <div class="register-box-body">


      <form class="needs-validation" method="post" action="{{ route('formulario.register') }}" novalidate>
        {!! csrf_field() !!}
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputRN">Razão social</label>
            <input type="text" name="name" class="form-control" id="inputRN"  placeholder="razão social da empresa">
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <input type="hidden" name="tipousuario" value="cliente" class="form-control" >
          <input type="hidden" name="tipopessoa" value="juridica" class="form-control" >
          <div class="form-group col-md-4 " >
            <label for="inputPhoneNumber">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="inputPhoneNumber" placeholder="Telefone">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCPF">CNPJ</label>
            <input type="text" name="cnpj" class="form-control" id="inputCPF" placeholder="CNPJ">
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail">E-mail</label>
            <input type="email" name="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword">Senha</label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha">
            @if (session('status-senha'))
            <div class="alert alert-danger">
              {{ session('status-senha') }}
            </div>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword">Confirmar Senha</label>
            <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar Senha">
            @if (session('status-senha'))
            <div class="alert alert-danger">
              {{ session('status-senha') }}
            </div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="inputStreet">Rua</label>
          <input type="text"name="rua" class="form-control" id="inputStreet" placeholder="Rua">
          @if (session('status'))
          <div class="alert alert-danger">
            {{ session('status') }}
          </div>
          @endif
        </div>
        <div class="form-row">
          <div class="form-group col-md-7">
            <label for="inputBairro">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="inputBairro" placeholder="Bairro">
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <div class="form-group col-md-3">
            <label for="inputHnumber">Número</label>
            <input type="text" name="numero" class="form-control" id="inputHnumber" placeholder="Número">
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <div class="form-group col-md-2">
            <label for="inputCommplemento">Complemento</label>
            <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="inputCity">
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <div class="form-group col-md-3 offset-sm-1">
            <label for="inputCEP">CEP</label>
            <input type="text" name="cep" class="form-control" id="inputCPF">
            @if (session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <div class="form-group col-md-2">
            <label for="inputState">Estado</label>
            <select id="inputState">
              <option value="">Selecione</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espirito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MT">Mato Grosso</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-md-4 offset-md-4 mb-3">
        <button type="submit" class="btn btn-success btn-block">Criar seu cadastro</button>
      </div>
      </form>




</div>
</div>
</div>


@endsection
