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

    <div class="container offset-md-4">
      <br><br><br><br>
      <div class="row">
        <form class="form-signin col-md-4">
          <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
          <h1 class="text-center h3 mb-3 font-weight-normal">Please sign in</h1>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">

          <label>
            <button type="button" class="btn btn-link">Não tem login? Cadastre-se!</button>
          </label>

          <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
          <p class="text-center mt-5 mb-3 text-muted">© 2017-2018</p>
        </form>
      </div>
    </div>
    <br><br><br><br>


    </body>
</html>
