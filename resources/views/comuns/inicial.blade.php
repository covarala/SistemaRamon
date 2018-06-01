@extends('comuns.estatico.layout')

@section('navegacao')
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0d823b;">
  <a class="navbar-brand" href="#"><img src="imagens\logo.png" width="134" height="38" alt="">
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="imagens\login.png" width="37" height="37" alt="">
          Entrar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Login</a>
          <a class="dropdown-item" href="#">Cadastrar</a>
          </div>
    </ul>
    </li>
  </div>
</nav>
@endsection

@section('conteudo')



@endsection
