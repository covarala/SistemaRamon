<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewEnderecoJuridica;
use App\Models\Orcamento;
use Spatie\Geocoder\Facades\Geocoder;
use GoogleMaps\Facade\GoogleMapsFacade;

use DB;

class ApiController extends Controller
{
    //

    public function __construct()
    {
      $enderecoUsuario = null;
    }

    private $dadosOrcamento = null;


    private function coordenadasDistribuidor($enderecos)
    {
      $apikey = env('GOOGLE_MAPS_KEY', '');

      $coordenadas = array();
      $cont = 0;

      foreach ($enderecos as $endereco => $valores) {

        foreach ($valores as $dado => $value) {
          if ($dado === 'Endereco') {
            $coordenadas[$cont] = Geocoder::getCoordinatesForAddress($value, $apikey);
            $idsJuridicas[$cont] = $enderecos[$cont]->idJuridica;
            $cont++;
          }
        }
      }
      $dados = [
        'ids' => $idsJuridicas,
        'coordenadas' => $coordenadas,
      ];
      dd($dados);
      return $coordenadas;
    }

    public function calculaMenorDistanica()
    {
      $cont = 0;


      $dadosQntProdutosDistribuidores = DB::table('qntProdutosDistribuidores')->get();

      $enderecos = DB::table('dadosusuariojuridica')->where('distribuidor','=', true)->get();



      $dadosDistribuidores = $this->coordenadasDistribuidor($enderecos);

      foreach ($dadosDistribuidores as $key => $value) {
        foreach ($value as $keyValue => $endDist) {
          if ($keyValue === 'formatted_address') {
            $distancias[$cont] = \GoogleMaps::load('distancematrix')
            ->setParam([
              'origins'       => $this->enderecoUsuario,
              'destinations'  => $endDist,
              'mode' => 'car',
              'language' => 'GB'
            ])
            ->getResponseByKey('rows.elements.distance');
            // ->get('');
            $cont++;
          }
        }
      }

      $cont2 = 0;

      foreach ($distancias as $distancia) {
        $result = $distancia;
        $rows = $result['rows'];
        $row = $rows[0];
        $elements = $row['elements'];
        $element = $elements[0];
        $distances = $element['distance'];
        $distance = $distances['value'];
        $todasDistancias[$cont2] = $distance;
        $cont2++;
      }

      $menorDistancia = $todasDistancias[0];
      foreach ($todasDistancias as $key => $value) {
        if ($menorDistancia > $value) {
          $menorDistancia = $value;
        }
      }
      dd($menorDistancia);

      return $menorDistancia;
    }

    public function localizacao(Request $request)
    {
      $lat = $request->posicaoLat;
      $lon = $request->posicaoLon;

      $coordenadas = [
        'latitude' => $lat,
        'longitude' => $lon,
      ];

      $endereco = $this->getEnderecoUsuario($coordenadas);

      $this->setEndereco($endereco['formatted_address']);

      // dd($request->individual);
      $dadosParaOrcamento = array(
        '1' => $request->individual,
        '2' => $request->sm,
        '3' => $request->display,
        '4' => $request->caixaMasterIndividual,
        '5' => $request->caixaMasterSm,
        '6' => $request->caixaMasterDisplay,

      );

      foreach ($dadosParaOrcamento as $key => $value) {
        // code...
        if($value === null)
        {
          $dadosParaOrcamento[$key] = "0";
        }
      }

      $this->setDadosParaOrcamento($dadosParaOrcamento);

      // $this->calculaMenorDistanica();
      $this->encontraDistribuidor();
    }

    public function getEnderecoUsuario($coordenadas)
    {
      // dd($coordenadas);
      $endereco = Geocoder::getAddressForCoordinates($coordenadas['latitude'], $coordenadas['longitude']);
      return $endereco;
    }

      public function encontraDistribuidor()
    {
      $tmp = $this->calculaMenorDistanica();
      $this->realizaOrcamento();
      return null;
    }

    public function setEndereco($endereco)
    {
      $this->enderecoUsuario = $endereco;
    }
    public function setDadosParaOrcamento($dados)
    {
      $this->dadosOrcamento = $dados;
      // dd($this->dadosOrcamento);
    }

    public function realizaOrcamento()
    {
      $valorProduto = array();
      $valorPorProdutoOrcamento = array();
      $cont = 1;

      $valores = DB::table('valorproduto')->select('idProduto','valor')->get();
      $dadosParaOrcamento = $this->dadosOrcamento;
      foreach ($valores as $valor => $value) {
        if ($value->idProduto == $cont) {
          $valorProduto[$cont] = $value->valor;
        }
        $cont++;
      }

      $cont = 1;

      $valorOrcamentoTotal = 0;

      foreach ($dadosParaOrcamento as $key => $value) {
        $valorPorProdutoOrcamento[$cont] = $dadosParaOrcamento[$cont] * $valorProduto[$cont];
        $valorOrcamentoTotal = $valorOrcamentoTotal + $valorPorProdutoOrcamento[$cont];
        $cont++;
      }

      dd($valorOrcamentoTotal);

    }


}
