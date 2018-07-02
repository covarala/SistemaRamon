@extends('comuns.estatico.layout')
@section('conteudo')
<div class="album py-5 bg-light">
  <div class="container col-md-9  offset-md-auto mb-5 ">
    <ul class="nav justify-content-end">
      <a data-toggle="modal" data-target="#ModalOrçamento">
        <button type="button" class="efeito efeito-6" data-toggle="modal" data-target="#ModalOrçamento">Gostou dos nossos produtos?</button>
      </a>
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="ModalOrçamento" tabindex="-1" role="dialog" aria-labelledby="ModalLabelOrçamento" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center text-success font-weight-bold" id="ModalLabelOrçamento">Orçamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h6 class="text offset-sm-1 py-4 text-success font-weight-bold">Informe a quantidade desejada de cada produto:</h6>
            <form class="offset-sm-1" id="formLocalizacao" action="{{ route('formulario.localizacao') }}" method="post">
                {!! csrf_field() !!}
            <div class="form-group row">
              <label for="inputPassword" class="col-form-label">Individual</label>
              <div class="col-sm-2">
                <input name="individual" type="number" min="0" max="400" class="form-control" placeholder="Qtd">
              </div>
              <label for="inputPassword" class="col-form-label">SM</label>
              <div class="col-sm-2">
                <input min="0" max="56" name="sm" type="number" class="form-control" placeholder="Qtd">
              </div>
              <label for="inputPassword" class="col-form-label">Display</label>
              <div class="col-sm-2">
                <input min="0" max="32" name="display" type="number" class="form-control" placeholder="Qtd">
              </div>
            </div>
            <h6 class="text justify-content-start py-4 ">Tipos de Caixa Master:</h6>
            <div class="form-group row">
              <label for="inputPassword" class="col-form-label">Individual</label>
              <div class="col-sm-2">
                <input min="0" name="caixaMasterIndividual" type="number" class="form-control" placeholder="Qtd">
              </div>
              <label for="inputPassword" class="col-form-label">SM</label>
              <div class="col-sm-2">
                <input min="0" name="caixaMasterSm" type="number" class="form-control" placeholder="Qtd">
              </div>
              <label for="inputPassword" class="col-form-label">Display</label>
              <div class="col-sm-2">
                <input min="0" name="caixaMasterDisplay" type="number" class="form-control" placeholder="Qtd">
              </div>
            </div>
          </div>

          <input id="posicaoLon" type="hidden" name="posicaoLon"  value="">
          <input id="posicaoLat" type="hidden" name="posicaoLat"  value="">

          <div class="modal-footer">
            <h6 class="text justify-content-start py-4 text-danger font-weight-bold">Atenção !!! Permita a utilização da sua localização quando requisitado pelo navegador, assim podemos efetuar sua requisição para um distribuidor mais próximo de você !</h6>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" id="getCoordenadas" class="btn btn-success" onclick="getLocation()">Continuar</button>
          </div>
        </form>
        <script type="text/javascript">
        var x=document.getElementById("getCoordenadas");
        function getLocation()
          {
          if (navigator.geolocation)
            {
            navigator.geolocation.getCurrentPosition(getPosition);
            }
          else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
          }
        function getPosition(position)
          {

          var posicaoLat = position.coords.latitude;
          var posicaoLon = position.coords.longitude;

          document.getElementById("posicaoLat").value = posicaoLat;
          document.getElementById("posicaoLon").value = posicaoLon;

          document.getElementById("formLocalizacao").submit();
          }
        </script>
        </div>
      </div>
    </div>

      @if(isset($orcamento))
      <div class="alert alert-info">
        <h6 class="text offset-sm-1 py-4 text-success font-weight-bold">Preço orçamentado de cada produto:</h6>
        <form class="offset-sm-1" action="{{ route('efetivacao.orcamento') }}" method="post">
          <?php
          $total = $orcamento['total'];
          $separado = $orcamento['separado'];

          $sessao = session()->all();
          ?>
          {!! csrf_field() !!}
          @foreach ($qntProdutos as $qntProduto => $valor)
          <input type="hidden" name="{{$qntProduto.'Qnt'}}" value="{{$valor}}">
          @endforeach

          @foreach ($separado as $key => $value)
          <div class="form-group row">
            <label for="inputPassword" class="col-form-label">{{$key}}: R$ {{number_format($value, 2, ',', '.')}}</label>
            <input type="hidden" name="{{$key.'Valor'}}" value="{{$value}}">
          </div>
          @endforeach
          <div class="form-group row">
            <label for="inputPassword" class="col-form-label font-weight-bold">Valor Total: R$ {{number_format($total, 2, ',', '.')}}</label>
            <input type="hidden" name="total" value="{{$total}}">
            <input type="hidden" name="idUserRec" value="{{$menorDistancia['idUser']}}">
            <input type="hidden" name="idUserPed" value="{{$sessao['id']}}">
            <input type="hidden" name="idJuridica" value="{{$menorDistancia['idJuridica']}}">
            <input type="hidden" name="distancia" value="{{$menorDistancia['distancia']}}">
          </div>
        </div>

  <div class="modal-footer">
    <button type="submit" class="btn btn-success">Efetivar Orçamento</button>
  </div>
</form>
</div>

@endif

@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif



<!-- Primeira linha -->
<div class="card-deck mb-3">
  <div class="card">
    <img class="card-img-top" src="{{ asset('imagens\unidadecomsombra.png')}}" width="208" height="225" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Individual - 25g</h5>
      <p class="card-text" align="justify">Em BOPP (sistema Flow Pack), código de barras GS1, validade, informação nutricional e demais informações.</p>
    </div>
    <div class="card-footer">
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{ asset('imagens\SMcomsombra.png')}}" width="208" height="225" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">SM - 100g</h5>
      <p class="card-text" align="justify">Contém 04 barras de 25g.<br>
Validade, informação nutricional e demais informações.</p>
    </div>
    <div class="card-footer">

    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{ asset('imagens\rapadura-monada.png')}}" width="208" height="225" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Display - 450g</h5>
      <p class="card-text" align="justify">Contém 18 barras de 25 g.<br>Embalagem moderna, selada com poliolefínico, informação nutricional, validade, código de barra GS1 e demais informações.</p>
    </div>
    <div class="card-footer">

    </div>
  </div>
</div>
<!-- segunda linha -->
<div class="card-deck mb-3">
  <div class="card">
    <img class="card-img-top" src="{{ asset('imagens\rapadura-monada.png')}}" width="208" height="225" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Caixa Master - Embalagem SM</h5>
      <p class="card-text">Com 56 embalagens de 100g.<br>
        Peso: 5,6 Kg</p>
    </div>
    <div class="card-footer">

    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{ asset('imagens\rapadura-monada.png')}}" width="208" height="225" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Caixa Master - Embalagem 450g</h5>
      <p class="card-text">Com 32 embalagens de 450g<br>Peso: 14,4 Kg.</p>
    </div>
    <div class="card-footer">

    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{ asset('imagens\rapadura-monada.png')}}" width="208" height="225" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Caixa Master - Embalagem Individual 10 Kg</h5>
      <p class="card-text" align="justify">Com 400 barras de 25g.<br>
Para atender a merenda escolar, cantinas, cozinhas industriais e demais segmentos que não necessitam da embalagem intermediária.</p>
    </div>
    <div class="card-footer">

    </div>
  </div>
</div>

</div>
</div>
<div class="container">
<div class="media">
  <img class="rounded-circle align-self-center mr-3" src="{{ asset('imagens\trapadura.png')}}" width="180" height="180" alt="">
  <div class="media-body">
    <h3 class="mt-0 font-weight-bold">Qualidade Nutricional</h4>
    <p align="justify">   A rapadura ocupa dentre os diversos tipos de açúcares disponíveis no mercado, uma posição inigualável. É evidente que este produto, do ponto de vista da nutrição, leva vantagem em relação aos produtos similares, pois traz em sua composição elementos essenciais ao organismo humano, tanto os de natureza orgânica quanto minerais e vitaminas. No grupo dos orgânicos destacam-se a sacarose, a glucose e a frutose que, consumidos pelo organismo humano, vão lhe oferecer energia necessária às suas atividades. Esses açúcares são desdobrados no organismo em açúcares simples, glicose, produzindo após várias oxidações, energia, CO² e H²O . Desses três componentes, a energia produzida é a que dá força ao organismo e sustentação à vida.</p>
    <img class="rounded mx-auto d-block" src="{{ asset('imagens\table.png')}}" alt="">
    <p class="mb-0 text-sm font-italic" align="justify">*% Valores Diários de Referência com base em uma dieta de 2.000 Kcal ou 8.400 Kj. Seus valores diários podem ser maiores ou menores dependendo de suas necessidades energéticas.<br>
      *% Valores Diarios de referencia basados em una dieta de 2.000 Kcal o 8.400 Kj. Sus valores diarios pueden ser mayores o menores dependiendo de sus necesidades calóricas.<br>
      *% Daily Values are based on a 2.000 Kcal or 8.400 Kj diet. Your daily values may be higher or lower depending on your calorie needs. <br>
      ** Valor diário não estabelecido / Valor diario no establecido / Daily value not established.</p>
  </div>
</div>
</div>
<br></br>
@endsection
