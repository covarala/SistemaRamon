@extends('comuns.estatico.layout')
@section('conteudo')
<div class="album py-5 bg-light">
  <div class="container col-md-9  offset-md-auto mb-5">
    <ul class="nav justify-content-end">
      <button type="button" class="efeito efeito-6">Gostou dos nossos produtos?</button>
    </ul>

<!-- Primeira linha -->
  <div class="card-deck mb-3">
    <div class="card">
      <img class="card-img-top" src="imagens\rapadura-monada.png" width="208" height="225" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Individual - 25g</h5>
        <p class="card-text">Em BOPP (sistema Flow Pack), código de barras GS1, validade, informação nutricional e demais informações.</p>
      </div>
      <div class="card-footer">
        <a href="detalhes" class="btn btn btn-block btn-success">Ver produto</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="imagens\rapadura-monada.png" width="208" height="225" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">SM - 100g</h5>
        <p class="card-text">Contém 04 barras de 25g.
Validade, informação nutricional e demais informações.</p>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn btn-block btn-success">Ver produto</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="imagens\rapadura-monada.png" width="208" height="225" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Display - 450g</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn btn-block btn-success">Ver produto</a>
      </div>
    </div>
  </div>
<!-- segunda linha -->
  <div class="card-deck mb-3">
    <div class="card">
      <img class="card-img-top" src="imagens\rapadura-monada.png" width="208" height="225" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Caixa Master - Embalagem SM</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn btn-block btn-success">Ver produto</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="imagens\rapadura-monada.png" width="208" height="225" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Caixa Master - Embalagem 450g</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn btn-block btn-success">Ver produto</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="imagens\rapadura-monada.png" width="208" height="225" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Caixa Master - Embalagem Individual 10 Kg</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn btn-block btn-success">Ver produto</a>
      </div>
    </div>
  </div>

  </div>
</div>


@endsection
