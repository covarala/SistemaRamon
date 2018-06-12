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

        <form class="needs-validation" novalidate>
          {!! csrf_field() !!}
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputName">nome completo</label>
              <input type="text" class="form-control" id="inputName"  placeholder="nome completo">
            </div>
            <div class="form-group col-md-4 " >
              <label for="inputPhoneNumber">telefone</label>
              <input type="text" class="form-control" id="inputPhoneNumber" placeholder="Telefone">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCPF">CPF</label>
              <input type="text" class="form-control" id="inputCPF" placeholder="CPF">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail">e-mail</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">senha</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Senha">
            </div>
          </div>
          <div class="form-group">
            <label for="inputStreet">rua</label>
            <input type="text" class="form-control" id="inputStreet" placeholder="Rua">
          </div>
          <div class="form-row">
            <div class="form-group col-md-7">
              <label for="inputBairro">bairro</label>
              <input type="text" class="form-control" id="inputBairro" placeholder="Bairro">
            </div>
            <div class="form-group col-md-3">
              <label for="inputHnumber">numero</label>
              <input type="text" class="form-control" id="inputHnumber" placeholder="Número">
            </div>
            <div class="form-group col-md-2">
              <label for="inputCommplemento">complemento</label>
              <input type="text" class="form-control" id="inputComplemento" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">cidade</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-3 offset-sm-1">
              <label for="inputCEP">CEP</label>
              <input type="text" class="form-control" id="inputCPF">
            </div>
            <div class="form-group col-md-2">
              <label for="inputState ">estado</label>
              <select id="inputState " value="MG" class="form-control custom-select">
                <option selected></option>
                <option>MG</option>
                <option>SP</option>
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

        <form class="needs-validation" novalidate>
          {!! csrf_field() !!}
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputRN">razão social</label>
              <input type="text" class="form-control" id="inputRN"  placeholder="razão social da empresa">
            </div>
            <div class="form-group col-md-4 " >
              <label for="inputPhoneNumber">telefone</label>
              <input type="text" class="form-control" id="inputPhoneNumber" placeholder="Telefone">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCPF">CNPJ</label>
              <input type="text" class="form-control" id="inputCPF" placeholder="CNPJ">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail">e-mail</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="E-mail">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">senha</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Senha">
            </div>
          </div>
          <div class="form-group">
            <label for="inputStreet">rua</label>
            <input type="text" class="form-control" id="inputStreet" placeholder="Rua">
          </div>
          <div class="form-row">
            <div class="form-group col-md-7">
              <label for="inputBairro">bairro</label>
              <input type="text" class="form-control" id="inputBairro" placeholder="Bairro">
            </div>
            <div class="form-group col-md-3">
              <label for="inputHnumber">numero</label>
              <input type="text" class="form-control" id="inputHnumber" placeholder="Número">
            </div>
            <div class="form-group col-md-2">
              <label for="inputCommplemento">complemento</label>
              <input type="text" class="form-control" id="inputComplemento" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">cidade</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-3 offset-sm-1">
              <label for="inputCEP">CEP</label>
              <input type="text" class="form-control" id="inputCPF">
            </div>
            <div class="form-group col-md-2">
              <label for="inputState ">estado</label>
              <select id="inputState " value="MG" class="form-control custom-select">
                <option selected></option>
                <option>MG</option>
                <option>SP</option>
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
