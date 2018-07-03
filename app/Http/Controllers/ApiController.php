<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewEnderecoJuridica;
use App\Models\Orcamento;
use App\Models\ProdutoDistribuidor;
use Spatie\Geocoder\Facades\Geocoder;
use GoogleMaps\Facade\GoogleMapsFacade;

use DB;

class ApiController extends Controller
{
    //

      // foreach ($novasQnt as $novaQnt => $value) {
      //   dd($value['idJuridica']);
      //   ProdutoDistribuidor::where('idJuridica', $value['idJuridica'])
      //   ->where('idProduto', $value['idProduto'])
      //   ->update(['qnt' => $value['novaQnt']]);
      // }

    public function __construct()
    {
      $enderecoUsuario = null;
    }
    private $qntProdParaOrcamento = null;
    private $novasQnt = null;

    private function coordenadasDistribuidor($enderecos)
    {
      $apikey = env('GOOGLE_MAPS_KEY', 'AIzaSyCKTAc2EVbRB4y1iGxs08Bk0ck-C64u7JM');

      $coordenadas = array();
      $cont = 0;

      foreach ($enderecos as $endereco => $valores) {

        foreach ($valores as $dado => $value) {
          if ($dado === 'Endereco') {
            $coordenadas[$cont] = [
              'coordenadas' => Geocoder::getCoordinatesForAddress($value, $apikey),
              'idJuridica' => $enderecos[$cont]->idJuridica,
              'idUser' => $enderecos[$cont]->idUser,
            ];
            $cont++;
          }
        }
      }
      // dd($coordenadas);
      return $coordenadas;
    }

    public function calculaMenorDistanica($idDistribuidores)
    {
      $cont = 0;
      $contador = 0;

      foreach ($idDistribuidores as $idDistribuidor => $value) {
        $enderecos[$contador] = DB::table('dadosusuariojuridica')->where('distribuidor','=', true)
          ->where('idUser', $value['idUser'])->first();
          $contador++;
      }

      $dadosDistribuidores = $this->coordenadasDistribuidor($enderecos);


      foreach ($dadosDistribuidores as $key => $value) {
        $indexesDistribuidores = $dadosDistribuidores[$cont];
        $coordenadasDistribuidores = $indexesDistribuidores['coordenadas'];
        $formattedAddress = $coordenadasDistribuidores['formatted_address'];

        $distancias[$cont] = [
          'distancia' => \GoogleMaps::load('distancematrix')
            ->setParam([
                        'origins'       => $this->enderecoUsuario,
                        'destinations'  => $formattedAddress,
                        'mode' => 'car',
                        'language' => 'GB'
                      ])->getResponseByKey('rows.elements.distance'),
            'idUser'=> $value['idUser'],
            'idJuridica'=> $value['idJuridica'],
           ];
        // ->get('');
        $cont++;
      }

      $cont2 = 0;


      foreach ($distancias as $distancia => $value) {
        $result = $value['distancia'];
        $rows = $result['rows'];
        $row = $rows[0];
        $elements = $row['elements'];
        $element = $elements[0];
        $distances = $element['distance'];
        $distance = $distances['value'];
        $todasDistancias[$cont2] = [
          'idUser' => $value['idUser'],
          'idJuridica' => $value['idJuridica'],
          'distancia' => $distance,
        ];
        $cont2++;
      }

      $menorDistancia = $todasDistancias[0];
      foreach ($todasDistancias as $key => $value) {
        if ($menorDistancia['distancia'] > $value['distancia']) {
          $menorDistancia = [
            'idUser' => $value['idUser'],
            'idJuridica' => $value['idJuridica'],
            'distancia' => $value['distancia'],
          ];

        }
      }
      return $menorDistancia;
    }

    public function getMenorDistancia(Request $request)
    {
      $lat = $request->posicaoLat;
      $lon = $request->posicaoLon;

      $coordenadas = [
        'latitude' => $lat,
        'longitude' => $lon,
      ];

      $endereco = $this->getEnderecoUsuario($coordenadas);

      $this->setEndereco($endereco['formatted_address']);

      $idDistribuidores = $this->encontraDistribuidor();

      $menorDistancia = $this->calculaMenorDistanica($idDistribuidores);
      $orcamento  =  $this->precoProdutos($request);
      $qntProdutos = $this->getQntProdParaOrcamento();

      return view('comuns.produtos', compact('orcamento', 'menorDistancia','qntProdutos'));


    }
    public function precoProdutos(Request $request)
      {
      // dd($request->individual);
      $qntProdParaOrcamento = [
        'Individual' => $request->individual,
        'SM' => $request->sm,
        'Display' => $request->display,
        'CaixaMasterIndividual' => $request->caixaMasterIndividual,
        'CaixaMasterSm' => $request->caixaMasterSm,
        'CaixaMasterDisplay' => $request->caixaMasterDisplay,
      ];

      foreach ($qntProdParaOrcamento as $key => $value) {
        if($value === null)
        {
          $qntProdParaOrcamento[$key] = "0";
        }
      }

      $this->setQntProdParaOrcamento($qntProdParaOrcamento);

      $orcamento = $this->realizaOrcamento();

      return $orcamento;



    }

    public function getEnderecoUsuario($coordenadas)
    {
      $endereco = Geocoder::getAddressForCoordinates($coordenadas['latitude'], $coordenadas['longitude']);
      return $endereco;
    }

    public function encontraDistribuidor()
    {
      $distribuidores = DB::table('juridica')->where('distribuidor','=', true)->get();
      $distribuidoresPossiveis = [];
      $cont = 0;
      foreach ($distribuidores as $distribuidor => $value) {
        $novasQnt = $this->verificaDistribuidor($value->idUser);
        if($novasQnt !== false)
        {

          $distribuidoresPossiveis[$cont] = [
            'idUser' => $value->idUser,
            'idJuridica' => $value->id,
          ];
          $cont++;
        }
        else {
          $distribuidoresPossiveis[$cont] = [
            'idUser' => '13',
            'idJuridica' => '7',
          ];
        }
      }
      return $distribuidoresPossiveis;
    }

    public function verificaDistribuidor($idDistribuidor)
    {

      $qntProdParaOrcamento = $this->getQntProdParaOrcamento();
      $qntProdDistribuidor = $this->qntProdDistribuidor($idDistribuidor);

      $verificaQnt = [];
      $contador2 = 0;

        $contador = 0;
        $produtos = $qntProdDistribuidor['produtos'];
        foreach ($produtos as $produto => $valor) {

          if ($valor['qnt'] - $qntProdParaOrcamento[$contador] > 50) {
            $novaQnt = $valor['qnt'] - $qntProdParaOrcamento[$contador];
            $orcamento = true;
          }
          else {
            $novaQnt = $valor['qnt'] ;
            $orcamento = false;
          }

          $verificaQnt[$contador] = [
            'idUser' => $idDistribuidor,
            'idJuridica' => $qntProdDistribuidor['idJuridica'],
            'idProduto' => $valor['idProduto'],
            'nomeProduto' => $valor['nome'],
            'novaQnt' => $novaQnt,
            'orcamento' => $orcamento,
          ];
          $contador++;
        }

      $novasQnt = $verificaQnt;
      $this->setNovasQnt($novasQnt);

      foreach ($novasQnt as $key => $value) {
        if ($value['orcamento'] === false) {
          return false;
        }
      }

      return $novasQnt;
    }


    public function qntProdDistribuidor($idDistribuidor)
    {

      $dadoJuridica = DB::table('dadosusuariojuridica')->where('distribuidor','=', true)->where('idUser', '=', $idDistribuidor)->first();
      $dadosQntProdutosDistribuidores = DB::table('qntprodutosdistribuidores')->where('idJuridica','=',$dadoJuridica->idJuridica)->get();

      $contador = 0;
      $produtosDist =[];

        foreach ($dadosQntProdutosDistribuidores as $key => $value) {


        $produtosDist[$contador] = [
          'idProduto' => $value->idProduto,
          'nome' => $value->nomeProduto,
          'qnt' => $value->qntProdDist,
        ];
        $contador++;
        }
      $qntProdDistribuidor = [
        'nome' => $dadoJuridica->Nome,
        'idJuridica' => $dadoJuridica->idJuridica,
        'produtos' => $produtosDist,
      ];
      return $qntProdDistribuidor;
    }

    public function realizaOrcamento()
    {
      $valorProduto = [];
      $valorPorProdutoOrcamento = [];

      $dadosParaOrcamento = $this->qntProdParaOrcamento;

      $valores = DB::table('valorproduto')->join('produto','valorproduto.id','=','produto.id')
        ->select('nome','produto.id','valor')->get();
      $cont = 0;
      $valorOrcamentoTotal = 0;

      foreach ($dadosParaOrcamento as $key => $value) {
        foreach ($valores as $valor => $dado) {
          if ($dado->nome == $key) {
            $valorProduto[$key] = $dado->valor;
          }
        }
        $valorPorProdutoOrcamento[$key] = $dadosParaOrcamento[$key] * $valorProduto[$key];
        $valorOrcamentoTotal = $valorOrcamentoTotal + $valorPorProdutoOrcamento[$key];
      }

      $orcamento =[
        'total' => $valorOrcamentoTotal,
        'separado' => $valorPorProdutoOrcamento,
      ];

      return $orcamento;
    }

    public function setEndereco($endereco)
    {
      $this->enderecoUsuario = $endereco;
    }
    public function getEndereco()
    {
      return $this->enderecoUsuario;
    }

    public function setQntProdParaOrcamento($qntProdParaOrcamento)
    {
      $this->qntProdParaOrcamento = $qntProdParaOrcamento;
    }
    public function getQntProdParaOrcamento()
    {
      return $this->qntProdParaOrcamento;
    }

    public function setNovasQnt($novasQnt)
    {
      $this->novasQnt = $novasQnt;
    }
    public function getNovasQnt()
    {
      return $this->novasQnt;
    }

}
