@extends('comuns.estatico.layout')

@section('navegacao')
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0d823b;">
  <a class="navbar-brand" href="#"><img src="imagens\logo.png" width="134" height="38" alt="">
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse row" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Produtos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Sobre<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Contatos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Representantes<span class="sr-only">(current)</span></a>
      </li>
    </ul>

    <ul class="navbar-nav mr-auto">
      <form class="form-inline my-2 my-sm-0" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="imagens\search.png" width="20" height="20" alt=""></button>
      </form>
    </ul>
    <ul class="navbar-nav">
      <div class="mb-3 mb-md-0 ml-md-3">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="imagens\login.png" width="37" height="37" alt="">
            Entrar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Login</a>
            <a class="dropdown-item" href="#">Cadastrar</a>
          </div>
        </li>
      </div>

    </ul>
  </div>
</nav>
@endsection

@section('conteudo')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="imagens\1.JPG" width="550" height="550" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="imagens\2.JPG" width="550" height="550" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="imagens\3.JPG" width="550" height="550" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



@endsection
