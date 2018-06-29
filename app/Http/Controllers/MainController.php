<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Users;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;

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
    // function distribuidores()
    // {
    //   $dados = DB::table('dadosusuariojuridica')->select('*')->where('distribuidor', '=', '1')->get();
    //   return view('comuns.distribuidores', compact('dados'));
    // }
    function sobre()
    {
        return view('comuns.sobre');
    }
    function detalhes()
    {

      return view('comuns.detalhes');
    }

    public function realizaOrcamento(Request $request)
    {
      dd($request->caixaMasterIndividual);
    }




}
