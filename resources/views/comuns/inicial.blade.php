@extends('comuns.estatico.layout')

@section('conteudo')

<!–– Carrossel de imagens : ––>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('imagens\BANNER1.PNG')}}" width="1260" height="465" alt="First slide">
        </div>
        <a href="{{route('produtos')}}"><div class="carousel-item">
         <img class="d-block w-100" src="{{ asset('imagens\BANNER-2.PNG')}}" width="1260" height="465" alt="Second slide">
       </a></div>
        <a href="{{route('sobre')}}"><div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('imagens\BANNER-3.png')}}" width="1260" height="465" alt="Third slide">
        </a></div>
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

<!–– Cards dos produtos : ––>

<div class="album py-5 bg-light">
  <div class="container col-md-10">
    <div class="row">
      <div class="card-group">
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="{{asset('imagens\unidadecomsombra.png')}}" width="208" height="225" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Individual - 25g</h5>
              <p class="card-text" align="justify">Em BOPP (sistema Flow Pack), código de barras GS1, validade, informação nutricional e demais informações.</p>
          <br></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="{{ asset('imagens\SMcard.png')}}" width="208" height="285" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">SM - 100g</h5>
              <p class="card-text" align="justify">Contém 04 barras de 25g.<br>
        Validade, informação nutricional e demais informações.</p>
        <br>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="{{ asset('imagens\Displaycard.png')}}" width="208" height="285" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Display - 450g</h5>
              <p class="card-text" align="justify">Contém 18 barras de 25 g.<br>Embalagem moderna, selada com poliolefínico, informação nutricional, validade, código de barra GS1 e demais informações.</p>
            </div>
          </div>
        </div>
        </div>
      </div>
      <ul class="pagination justify-content-end pagination-md">
      </ul>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end pagination-md">
          <li class="page-item">
            <a class="page-link text-success" href="{{route('produtos')}}"> <img src="https://png.icons8.com/color/16/ffffff/plus.png"> Ver mais produtos <span aria-hidden="true">&raquo;</span></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
@endsection
