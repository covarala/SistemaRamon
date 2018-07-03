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
          <br>
          <h2 class="text-left text-success" data-reactid="10">Meus Orçamentos</h1>
            <br>
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
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

        <div class="col-md-6 order-md-1">
          <br>
          <h2 class="text-left text-success" data-reactid="10">Meus Dados</h1>
            <br>
        <form class="needs-validation" method="post" action="{{ route('formulario.register.fisica') }}" novalidate>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputName">Nome</label>
              <input type="text" name="name" class="form-control"  id="inputName"  placeholder="Nome">
            </div>
            <div class="form-group col-md-8">
              <label for="inputName">Sobrenome</label>
              <input type="text" name="sobrenome" class="form-control" id="inputSobrenome"  placeholder="Sobrenome">
            </div>
            <div class="form-group col-md-4 " >
              <label for="inputPhoneNumber">Telefone</label>
              <input type="text" name="telefone" class="form-control" id="inputPhoneNumber" placeholder="Telefone">
            </div>
          </div>
          <input type="hidden" name="tipoUsuario" value="cliente" class="form-control">
          <input type="hidden" name="tipoPessoa" value="fisica" class="form-control">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCPF">CPF</label>
              <input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="CPF">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail">E-mail</label>
              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">Senha</label>
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Senha">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">Confirmar Senha</label>
              <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar Senha">
            </div>
          </div>
          <div class="form-group">
            <label for="inputStreet">Rua</label>
            <input type="text" name="rua" class="form-control" id="inputStreet" placeholder="Rua">
          </div>
          <div class="form-row">
            <div class="form-group col-md-7">
              <label for="inputBairro">Bairro</label>
              <input type="text" name="bairro" class="form-control" id="inputBairro" placeholder="Bairro">
            </div>
            <div class="form-group col-md-3">
              <label for="inputHnumber">Número</label>
              <input type="text" name="numero" class="form-control" id="inputHnumber" placeholder="Número">
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
            </div>
            <div class="form-group col-md-3 offset-sm-1">
              <label for="inputCEP">CEP</label>
              <input type="text" name="cep" class="form-control" id="inputCEP">
            </div>
            <div class="form-group col-md-2">
              <label for="inputState ">Estado</label>
              <select id="inputState" name="estado" class="form-group">
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
          <div class="col-md-4 offset-md-4 mb-3">
          <button type="submit" class="btn btn-success btn-block">salvar alterações</button>
        </div>
        </form>


        </div>




      </div>
    </div>
  </div>
</div>
<br><br>
@endsection
