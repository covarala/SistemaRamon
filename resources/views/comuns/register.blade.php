<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title', 'Rapadura Mônada')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="css/app.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="imagens\favicon .ico">
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0d823b;">
      <a class="navbar-brand"style="width:200px" href="inicial"><img src="imagens\logo.png" width="134" height="38" alt="">
      </a>
    </nav>

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

        <form class="needs-validation" method="post" action="{{ route('formulario.register') }}" novalidate>
          {!! csrf_field() !!}
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputName">Nome</label>
              <input type="text" name="name" class="form-control"  id="inputName"  placeholder="Nome">
              @if (session('status'))
              <div class="alert alert-danger">
                {{ session('status') }}
              </div>
              @endif
            </div>
            <div class="form-group col-md-8">
              <label for="inputName">Sobrenome</label>
              <input type="text" name="sobrenome" class="form-control" id="inputSobrenome"  placeholder="Sobrenome">
              @if (session('status'))
              <div class="alert alert-danger">
                {{ session('status') }}
              </div>
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
              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
              @if (session('status'))
              <div class="alert alert-danger">
                {{ session('status') }}
              </div>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">Senha</label>
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha">
              @if (session('status'))
              <div class="alert alert-danger">
                {{ session('status') }}
              </div>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">Confirmar Senha</label>
              <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar Senha">
              @if (session('status'))
              <div class="alert alert-danger">
                {{ session('status') }}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="inputStreet">Rua</label>
            <input type="text" name="rua" class="form-control" id="inputStreet" placeholder="Rua">
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
              <label for="inputState ">Estado</label>
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
          <button type="submit" class="btn btn-success btn-block">criar seu cadastar</button>
        </div>
        </form>


      </div>
      </div>
      <div class="tab-pane fade" id="pills-juridica" role="tabpanel" aria-labelledby="pills-juridica-tab">

        <div class="col-md-6 order-md-1 offset-md-3">

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
          <button type="submit" class="btn btn-success btn-block">criar seu cadastar</button>
        </div>
        </form>


      </div>



      </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    </body>
</html>
