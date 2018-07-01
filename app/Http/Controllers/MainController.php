<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Users;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Orcamento;

use DB;

class MainController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
        'aprovacao' =>  true,
        'valor' =>  $dadosOrcamento['total'],
      ];

      $qntOrcPed = DB::table('users')->where('id','=',$dadosOrcamento['idUserPed'])
        ->select('qntOrcPed')->first();
      $qntOrcRec = DB::table('users')->where('id','=',$dadosOrcamento['idUserRec'])
        ->select('qntOrcRec')->first();

      Users::where('id','=',$dadosOrcamento['idUserPed'])->update(['qntOrcPed' => $qntOrcPed->qntOrcPed+1]);
      Users::where('id','=',$dadosOrcamento['idUserRec'])->update(['qntOrcRec' => $qntOrcRec->qntOrcRec+1]);


      $dadosOrcamentoEmail = Orcamento::create($dadosParaBancoOrcamento);

      // $this->enviaEmailDistribuidor($dadosOrcamentoEmail);
      return redirect()->route('produtos')->with('status','Orçamento efetivado! Aguarde o contado de nossos distribuidores!');

    }
    public function distribuidorInicial($idUser)
    {
      $orcamentosRecebidos = DB::table('orcamento')->join('users','id','idEmissor')->where('idRecebedor','=',$idUser)->get();
      return view('distribuidor.orcamentosrecebidos', compact('orcamentosRecebidos'));
    }




}
