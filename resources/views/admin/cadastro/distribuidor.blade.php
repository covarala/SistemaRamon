@extends('admin.comuns.layout')

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
			content: "Aprovado";
			right: 100%;

		}


</style>
@endsection

@section('conteudo')

<div class="col-md-12 col-md-offset-4">
  <h2><br>Pessoas Juridicas Cadastradas</h2>
  <br>
</div>
@if (session('status'))
<div class="alert alert-info">
	{{ session('status') }}
</div>
@endif
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover order-column">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Distribuidor</th>

            </tr>
          </thead>
          <tbody>
            <?php $cont = 1; ?>
            @foreach ($distribuidores as $distribuidor)
            <tr>
              <th>{{ $cont }}</th>
              <th>{{ $distribuidor->nome }}</th>
              <th>{{ $distribuidor->email }}</th>
              <th>
                @if($distribuidor->distribuidor === 0)
					       <form class="" action="{{ route('form.change.distribuidor', $distribuidor->idUser) }}" method="post">
                  @csrf
                  <input type="hidden" name="atual" value="normal">
                  <input type="hidden" name="exclusao" value="false">
                  <div class="switch">
    								<input type="checkbox" onChange="this.form.submit()"  onclick="return confirm('Você tem certeza que deseja torná-lo(a) distribuidor?')"  name="option" id="option" />
    								<label for="option"><span></span></label>
    							</div>

                </form>
                @else
                <form class="" action="{{ route('form.change.distribuidor', $distribuidor->idUser) }}" method="post">
                  <input type="hidden" name="atual" value="distribuidor">
									<input type="hidden" name="exclusao" value="false">
                  @csrf
                  <div class="switch">
                    <input checked="" type="checkbox" onChange="this.form.submit()"  onclick="return confirm('Você tem certeza que deseja excluí-lo(a) de ser um distribuidor?')"  name="option" id="option" />
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

@endsection
