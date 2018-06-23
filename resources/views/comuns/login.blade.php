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
    <link rel="shortcut icon" href="{{ asset('imagens\favicon .ico')}}">
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0d823b;">
      <a class="navbar-brand"style="width:200px" href="inicial"><img src="imagens\logo.png" width="134" height="38" alt="">
      </a>
    </nav>

    <div class="container">
      <div class="login-form col-md-4 offset-md-4">
          <div class="form-group mb-4">
            <br><br>
            <h1 class="text-center h3 mb-3 font-weight-normal"><img src="imagens\chave.png">Entrar</h1>
          </div>
          <form class="form" action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">e-mail:</label>
              <label for="inputEmail" class="sr-only">Endereço de e-mail</label>
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Ex. joaodasilva@gmail.com" required="" autofocus="">
              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">senha:</label>
              <label for="inputPassword" class="sr-only">senha</label>
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="" required="">
              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <button class="btn btn-lg btn-success btn-block" type="submit">Continuar</button>

          </form>

          <br>
          <p class="text-center mt-5 mb-3 text-muted">Não tem cadastro? <a href="registrar">Cadastre-se</a><br>© 2017-2018</p>

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
