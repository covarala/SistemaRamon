@extends('distribuidor.comuns.layout')

@section('cabecalho')

<style media="screen">

	.switch{
			width:120px;
			height:28px;
			margin:0;


			position:relative;
		}

		.switch input{
			display:block;
			width:100%;
			height: 100%;

			position:absolute;
			top:0;
			left:0;
			z-index: 10;

			opacity: 0;
			cursor: pointer;

		}

		.switch label{
			display: block;
			width: 100%;
			height: 100%;

			background: -moz-linear-gradient(#750000, #B20000);
			background: -ms-linear-gradient(#750000, #B20000);
			background: -o-linear-gradient(#750000, #B20000);
			background: -webkit-linear-gradient(#750000, #B20000);
			background: linear-gradient(#750000, #B20000);

			border-radius: 40px;
		}

		.switch label:after{
			content: "";

			position: absolute;
			top: -10px;
			right: -20px;
			bottom: -10px;
			left: -10px;
			z-index: -1;

			background: -moz-linear-gradient(#EEEEEE, #AAAAAA);
			background: -ms-linear-gradient(#EEEEEE, #AAAAAA);
			background: -o-linear-gradient(#EEEEEE, #AAAAAA);
			background: -webkit-linear-gradient(#EEEEEE, #AAAAAA);
			background: linear-gradient(#EEEEEE, #AAAAAA);

			border-radius: inherit;

		}

		.switch label span{
			display: block;
			width: 40%;
			height: 100%;
			background: #C0C0C0;

			position: absolute;
			z-index: 2;
			right: 60%;
			top: 0;

			background: -moz-linear-gradient(#E0E0E0, #A0A0A0);
			background: -ms-linear-gradient(#E0E0E0, #A0A0A0);
			background: -o-linear-gradient(#E0E0E0, #A0A0A0);
			background: -webkit-linear-gradient(#E0E0E0, #A0A0A0);
			background: linear-gradient(#E0E0E0, #A0A0A0);

			border-radius: inherit;

		}

		.switch label span:after {
			content: "";

			position: absolute;
			left: 15%;
			top: 25%;

			width: 70%;
			height: 50%;

			background: -moz-linear-gradient(#F7F7F7, #CCCCCC);
			background: -ms-linear-gradient(#F7F7F7, #CCCCCC);
			background: -o-linear-gradient(#F7F7F7, #CCCCCC);
			background: -webkit-linear-gradient(#F7F7F7, #CCCCCC);
			background: linear-gradient(#F7F7F7, #CCCCCC);
			border-radius: inherit;
		}

		.switch label span:before {
			content: "";

			position: absolute;
			top: 50%;
			margin-top: -12px;
			right: -50%;

			text-transform: uppercase;
			font-weight: bold;
			font-family: Arial, sans-serif;
			font-size: 12px;

			color: #fff;

		}

		.switch input:checked ~ label {

			background: -moz-linear-gradient(#004010, #1A6600);
			background: -ms-linear-gradient(#004010, #1A6600);
			background: -o-linear-gradient(#004010, #1A6600);
			background: -webkit-linear-gradient(#004010, #1A6600);
			background: linear-gradient(#004010, #1A6600);
		}

		.switch input:checked ~ label span{
			right: -2px;
		}

		.switch input:checked ~ label span:before {

			right: 100%;

		}


</style>
@endsection

@section('conteudo')
<br>
<div class="container col-sm-8">
  <div class="row">
<div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            <label for="">
                <h5>Nome:</h5>
            </label>
            {{ $orcamentosUsuario[0]->nome }}
          </div>
            <div class="col-sm-4">
            <label for="">
              <h5>Email:</h5>
            </label>
            {{ $orcamentosUsuario[0]->email }}
            </div>
            <div class="col-sm-3">
            <label for="">
              <h5>Contato:</h5>
            </label>

            @foreach ($telefones as $telefone => $valor)
              @if($orcamentosUsuario[0]->nome === $valor->nome)
                {{ $valor->telefone.' / ' }}
              @endif
            @endforeach
          </div>
        </div>
				@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
				@endif

        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover order-column">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Id Orcamento</th>
              <th scope="col">Individual</th>
              <th scope="col">Sm</th>
              <th scope="col">Display</th>
              <th scope="col">Caixa Master Individual</th>
              <th scope="col">Caixa Master Sm</th>
              <th scope="col">Caixa Master Display</th>
              <th scope="col">Confirmação Recebimento</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $cont = 1;
             $idRepetido = -1;
             ?>
            @foreach ($orcamentosUsuario as $orcamentoUsuario => $value)
                <?php $idRepetido = $value->idEmissor; ?>
                  <tr>
                    <th>{{ $cont }}</th>
                      <th>{{ $value->idOrcamento }}</th>
                      <th>{{ $value->qntIndividual }}</th>
                      <th>{{ $value->qntSm }}</th>
                      <th>{{ $value->qntDisplay }}</th>
                      <th>{{ $value->qntCaixaMasterIndividual }}</th>
                      <th>{{ $value->qntCaixaMasterSm }}</th>
                      <th>{{ $value->qntCaixaMasterDisplay }}</th>
                      <th>
                        @if($value->aprovacao === 1)
        					       <form class="" action="{{ route('form.change.aprovacao') }}" method="post">
                          @csrf
                          <input type="hidden" name="avprovacao" value="true">
                          <input type="hidden" name="idOrcamento" value="{{ $value->idOrcamento }}">
	                          <div class="switch">
	            								<input  checked="" type="checkbox" onChange="this.form.submit()" name="option" id="option" />
	            								<label for="option"><span></span></label>
	            							</div>
                        </form>
                        @else
                        <form class="" action="{{ route('form.change.aprovacao') }}" method="post">
                          @csrf
                          <input type="hidden" name="avprovacao" value="true">
                          <input type="hidden" name="idOrcamento" value="{{ $value->idOrcamento }}">
                          <div class="switch">
                            <input type="checkbox" onChange="this.form.submit()" onclick="return confirm('Você tem certeza que deseja confirmar? Ao excluir não será possível desfazer.')"name="option" id="option" />
                            <label for="option"><span></span></label>
                          </div>
                        </form>
                        @endif
                      </th>
                  </tr>
                <?php $cont++; ?>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
