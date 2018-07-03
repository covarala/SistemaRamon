<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\ProdutoDistribuidor;
use App\Models\Users;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Orcamento;
use App\Models\ViewTelefone;
use App\Models\ViewEnderecoJuridica;

use DB;

class MainController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function teste()
     {
       $teste = new Users;
       $teste->teste();
     }

    public function login()
    {
        return view('comuns.login');
    }
    public function register()
    {
        return view('comuns.register');
    }
    function inicial()
    {
        return view('comuns.inicial');
    }
    function contatos()
    {
        return view('comuns.contatos');
    }
    function produtos()
    {
        return view('comuns.produtos');
    }
    function sobre()
    {
        return view('comuns.sobre');
    }
    function duvidas()
    {
        return view('comuns.duvidas');
    }
    function privacidade()
    {
        return view('comuns.privacidade');
    }
    function viewPerfil($idUser)
    {
      $dadosUsuario = DB::table('dadosusuariojuridica')->where('idUser','=',$idUser)->first();
      return view('comuns.perfil', compact('$dadosUsuario'));
    }

    public function realizaOrcamento(Request $request)
    {

      $dadosOrcamento = $request->all();
      $dadosParaBancoOrcamento = [
      	'qntIndividual' =>  $dadosOrcamento['IndividualQnt'],
      	'qntCaixaMasterIndividual' =>  $dadosOrcamento['CaixaMasterIndividualQnt'],
      	'qntDisplay' =>  $dadosOrcamento['DisplayQnt'],
      	'qntCaixaMasterDisplay' =>  $dadosOrcamento['CaixaMasterDisplayQnt'],
      	'qntSm' =>  $dadosOrcamento['SMQnt'],
        'qntCaixaMasterSm' =>  $dadosOrcamento['CaixaMasterSmQnt'],
        'idRecebedor' =>  $dadosOrcamento['idUserRec'],
        'idEmissor' =>  $dadosOrcamento['idUserPed'],
        'aprovacao' =>  false,
        'valor' =>  $dadosOrcamento['total'],
      ];

      $qntOrcPed = DB::table('users')->where('id','=',$dadosOrcamento['idUserPed'])
        ->select('qntOrcPed')->first();
      $qntOrcRec = DB::table('users')->where('id','=',$dadosOrcamento['idUserRec'])
        ->select('qntOrcRec')->first();


      $updateQntDist = DB::table('produto')
        ->join('produtodistribuidor','produtodistribuidor.id', 'produto.id')
        ->where('idJuridica','=',$dadosOrcamento['idJuridica'])
        ->select('produtodistribuidor.id','produto.id','produto.nome', 'produtodistribuidor.qnt')
        ->get();

      $dadosUpdate = [];

      foreach ($dadosOrcamento as $key => $value) {

        foreach ($updateQntDist as $chave => $valor) {
          if ($key === $valor->nome."Qnt") {
          $dadosUpdate["idJuridica"] = $valor->idJuridica;
          $dadosUpdate[$valor->idProduto] = $valor->qnt - $value;
          }
        }
      }

      foreach ($dadosUpdate as $key => $value) {
        if ($key !== 'idJuridica') {
          DB::table('produtodistribuidor')
            ->where('idJuridica',$dadosUpdate['idJuridica'])
            ->where('idProduto',$key)
            ->update([
              'qnt' => $value
            ]);
        }
      }


      Users::where('id','=',$dadosOrcamento['idUserPed'])->update(['qntOrcPed' => $qntOrcPed->qntOrcPed+1]);
      Users::where('id','=',$dadosOrcamento['idUserRec'])->update(['qntOrcRec' => $qntOrcRec->qntOrcRec+1]);

      $dadosOrcamentoEmail = Orcamento::create($dadosParaBancoOrcamento);

      // $this->enviaEmailDistribuidor($dadosOrcamentoEmail);
      return redirect()->route('produtos')->with('status','Orçamento efetivado! Aguarde o contado de nossos distribuidores!');

    }

    public function realizaOrcamentoDistribuidor(Request $request)
    {

      $dadosOrcamento = $request->all();
      $dadosParaBancoOrcamento = [
      	'qntIndividual' =>  $dadosOrcamento['IndividualQnt'],
      	'qntCaixaMasterIndividual' =>  $dadosOrcamento['CaixaMasterIndividualQnt'],
      	'qntDisplay' =>  $dadosOrcamento['DisplayQnt'],
      	'qntCaixaMasterDisplay' =>  $dadosOrcamento['CaixaMasterDisplayQnt'],
      	'qntSm' =>  $dadosOrcamento['SMQnt'],
        'qntCaixaMasterSm' =>  $dadosOrcamento['CaixaMasterSmQnt'],
        'idRecebedor' =>  $dadosOrcamento['idUserRec'],
        'idEmissor' =>  $dadosOrcamento['idUserPed'],
        'aprovacao' =>  false,
        'valor' =>  $dadosOrcamento['total'],
      ];

      $qntOrcPed = DB::table('users')->where('id','=',$dadosOrcamento['idUserPed'])
        ->select('qntOrcPed')->first();
      $qntOrcRec = DB::table('users')->where('id','=',$dadosOrcamento['idUserRec'])
        ->select('qntOrcRec')->first();


      $updateQntDist = DB::table('produto')
        ->join('produtodistribuidor','produtodistribuidor.id', 'produto.id')
        ->where('idJuridica','=',$dadosOrcamento['idJuridica'])
        ->select('produtodistribuidor.id','produto.id','produto.nome', 'produtodistribuidor.qnt')
        ->get();

      $dadosUpdate = [];

      foreach ($dadosOrcamento as $key => $value) {

        foreach ($updateQntDist as $chave => $valor) {
          if ($key === $valor->nome."Qnt") {
          $dadosUpdate["idJuridica"] = $valor->idJuridica;
          $dadosUpdate[$valor->idProduto] = $valor->qnt - $value;
          }
        }
      }

      foreach ($dadosUpdate as $key => $value) {
        if ($key !== 'idJuridica') {
          DB::table('produtodistribuidor')
            ->where('idJuridica',$dadosUpdate['idJuridica'])
            ->where('idProduto',$key)
            ->update([
              'qnt' => $value
            ]);
        }
      }


      Users::where('id','=',$dadosOrcamento['idUserPed'])->update(['qntOrcPed' => $qntOrcPed->qntOrcPed+1]);
      Users::where('id','=',$dadosOrcamento['idUserRec'])->update(['qntOrcRec' => $qntOrcRec->qntOrcRec+1]);

      $dadosOrcamentoEmail = Orcamento::create($dadosParaBancoOrcamento);

      // $this->enviaEmailDistribuidor($dadosOrcamentoEmail);
      return redirect()->route('produtos.distribuidor')->with('status','Orçamento efetivado com sucesso!');

    }

    public function distribuidorInicial($idUser)
    {
      $orcamentosRecebidos = DB::table('orcamento')->join('users','users.id','idEmissor')->where('idRecebedor','=',$idUser)->get();
      return view('distribuidor.orcamentosrecebidos', compact('orcamentosRecebidos'));
    }

    public function reposicaoProdutos()
    {
      return view('distribuidor.reposicao');
    }
    public function formReposicao(Request $request)
    {
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

      $valorProduto = [];
      $valorPorProdutoOrcamento = [];
      $idRecebedor = [];

      $dadosParaOrcamento = $qntProdParaOrcamento;

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

      $qntProdutos = $qntProdParaOrcamento;

      $orcamento =[
        'total' => $valorOrcamentoTotal,
        'separado' => $valorPorProdutoOrcamento,
      ];
      $tmp1 = Users::where('email','grawldesenvolvimentos@gmail.com') ->first();
      $tmp2 = Juridica::where('idUser',$tmp1->id) ->first();
      $idRecebedor =[
        'idUser' => $tmp1->id,
        'idJuridica' => $tmp2->id
    ];

      return view('distribuidor.reposicao', compact('orcamento','idRecebedor','qntProdutos'));
    }

    public function visualizaOrcamento($idEmissor)
    {
      $orcamentosUsuario = DB::table('orcamento')->join('users', 'users.id', 'idEmissor')
      ->where('idEmissor','=',$idEmissor)->select('*','orcamento.id as idOrcamento')->get();
      $telefones = DB::table('telefonesusuarios')->where('idUser','=',$idEmissor)->get();
      return view('distribuidor.orcamentosClientes', compact('orcamentosUsuario', 'telefones'));
    }

    public function changeAprovacao(Request $request)
    {
      $dados = $request->all();

      $orcamentoBanco = Orcamento::find($dados['idOrcamento']);

      if ($orcamentoBanco->aprovacao) {
        return redirect()->route('visualiza.orcamento.usuario', $orcamentoBanco->idEmissor)->with('status', 'Não é possivel desconfirmar o recebimento!');
      }
      $orcamentoBanco->aprovacao = true;
      $orcamentoBanco->save();
      return redirect()->route('visualiza.orcamento.usuario', $orcamentoBanco->idEmissor)->with('status', 'Confirmado com sucesso!');
    }




}
