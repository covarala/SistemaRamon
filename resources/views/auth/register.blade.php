@extends('layouts.app')

@section('content')
<div class="container">

    <br><br>
    <h1 class="text-center h3 mb-2 font-weight-normal"><img src="imagens\chave.png">Cadastre-se</h1>
    <br>
    <p class="text-center">Escolha o tipo de Pessoa:</p>
    <!–– Cadastro opções  : ––>
    <ul class="nav nav-pills mb-3 nav justify-content-center" id="pills-tab" role="tablist">
  <li class="nav-item mb-3">
    <a class="nav-link active text-dark"  id="pills-fisica-tab" data-toggle="pill" href="#pills-fisica" role="tab" aria-controls="pills-fisica" aria-selected="true">Pessoa Física</a>
  </li>
  <li class="nav-item mb-3">
    <a class="nav-link text-dark" id="pills-juridica-tab" data-toggle="pill" href="#pills-juridica" role="tab" aria-controls="pills-juridica" aria-selected="false">Pessoa Jurídica</a>
  </li>
</ul>
<div class="tab-content " id="pills-tabContent">
  <!–– Aba da Pessoa física  : ––>
  <div class="tab-pane fade show active" id="pills-fisica" role="tabpanel" aria-labelledby="pills-fisica-tab">
    <!–– formulário da pessoa fisica  : ––>
    <div class="col-md-6 order-md-1 offset-md-3">

    <form method="post" class="needs-validation" action="{{ route('formulario.register') }}" aria-label="{{ __('Register') }}" novalidate>
      @csrf
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="inputName">Nome</label>
          <input type="text" name="name" class="form-control" id="inputName"  placeholder="Nome">
          @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-8">
          <label for="inputName">Sobrenome</label>
          <input type="text" name="sobrenome" class="form-control" id="inputName"  placeholder="Sobrenome">
          @if ($errors->has('sobrenome'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('sobrenome') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group col-md-4 " >
          <label for="inputPhoneNumber">Telefone</label>
          <input type="text" name="telefone" class="form-control" id="inputPhoneNumber" placeholder="Telefone">
        </div>
      </div>

      <input type="hidden" name="tipousuario" value="cliente" class="form-control">
      <input type="hidden" name="tipopessoa" value="fisica" class="form-control">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCPF">CPF</label>
          <input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="CPF">
          @if ($errors->has('cpf'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('cpf') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">E-mail</label>
          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword">Senha</label>
          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha">
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword">{{ __('Repita a senha') }}</label>
          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha">
          @if ($errors->has('password_confirm'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password_confirm') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="inputStreet">Rua</label>
        <input type="text" name="rua" class="form-control" id="inputStreet" placeholder="Rua">
      </div>
      <div class="form-row">
        <div class="form-group col-md-7">
          <label for="inputBairro">Bairro</label>
          <input type="text" name="bairro" class="form-control" id="inputBairro" placeholder="Bairro">
        </div>
        <div class="form-group col-md-3">
          <label for="inputHnumber">Número</label>
          <input type="text" name="numero" class="form-control" id="inputHnumber" placeholder="Número">
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
        </div>
        <div class="form-group col-md-3 offset-sm-1">
          <label for="inputCEP">CEP</label>
          <input type="text" name="cep" class="form-control" id="inputCPF">
        </div>
        <div class="form-group col-md-2">
          <label for="inputState ">Estado</label>
          <select id="inputState " name="estado" value="MG" class="form-control custom-select">
            <option selected="" value="">Selecione o Estado (UF)</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
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
        <button type="submit" class="btn btn-success btn-block">criar seu cadasto</button>
      </div>
    </form>


  </div>
</div>
<div class="tab-pane fade" id="pills-juridica" role="tabpanel" aria-labelledby="pills-juridica-tab">

  <div class="col-md-6 order-md-1 offset-md-3">

    <form method="post" class="needs-validation" action="{{ route('formulario.register') }}" aria-label="{{ __('Register') }}" novalidate>
      @csrf
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="inputRN">Razão social</label>
          <input type="text" name="name" class="form-control" id="inputRN"  placeholder="razão social da empresa">
          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
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
          @if ($errors->has('cnpj'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cnpj') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">E-mail</label>
          <input type="email" name="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword">Senha</label>
          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha">
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="inputStreet">Rua</label>
        <input type="text"name="rua" class="form-control" id="inputStreet" placeholder="Rua">
      </div>
      <div class="form-row">
        <div class="form-group col-md-7">
          <label for="inputBairro">Bairro</label>
          <input type="text" name="bairro" class="form-control" id="inputBairro" placeholder="Bairro">
        </div>
        <div class="form-group col-md-3">
          <label for="inputHnumber">Número</label>
          <input type="text" name="numero" class="form-control" id="inputHnumber" placeholder="Número">
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
        </div>
        <div class="form-group col-md-3 offset-sm-1">
          <label for="inputCEP">CEP</label>
          <input type="text" name="cep" class="form-control" id="inputCPF">
        </div>
        <div class="form-group col-md-2">
          <label for="inputState">Estado</label>
          <select id="inputState" name="estado" value="MG" class="form-control custom-select">
            <option selected="" value="">Selecione o Estado (UF)</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
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
        <button type="submit" class="btn btn-success btn-block">criar seu cadastro</button>
      </div>
    </form>


  </div>
</div>
</div>
</div>
@endsection
