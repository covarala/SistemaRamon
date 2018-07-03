@extends('comuns.estatico.layout')
@section('conteudo')
<br>
<div class="container-fluid">
<h2 class="text-left text-success" data-reactid="10">Minha Conta</h1>
  <br>
</div>
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-orcament-tab" data-toggle="pill" href="#v-pills-orcament" role="tab" aria-controls="v-pills-orcament" aria-selected="true"><img src="{{ asset('imagens\calcula.png') }}"alt=""> Orçamentos</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><img src="{{ asset('imagens\profile.png') }}"alt=""> Perfil</a>

    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-orcament" role="tabpanel" aria-labelledby="v-pills-orcament-tab">

        <div class="col-sm-7">
          <div class="row">
        <div class="container-fluid">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover order-column">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Orçamento</th>
                      <th scope="col">valor</th>
                      <th scope="col">seu distribuidor</th>
                      <th scope="col">status</th>
                    </tr>
                  </thead>
                  <tbody>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
    </div>
  </div>
</div>
<br><br>
@endsection
