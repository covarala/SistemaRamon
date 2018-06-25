<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Users;
use App\User;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Telefone;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function produtos()
    {
        return view('admin.produtos');
    }
    public function clientes()
    {
      $clientes = DB::table('users')->where('tipousuario','=','cliente')->orderBy('nome', 'asc')->get();  
      return view('admin.clientes',compact('clientes'));
    }
    public function usuarios()
    {

      $usuarios = DB::table('users')->orderBy('nome', 'asc')->get();
        return view('admin.usuarios', compact('usuarios'));
    }
    public function distribuidor()
    {
        return view('admin.distribuidor');
    }
    public function relatorio()
    {
        return view('admin.relatorio');
    }
    public function visaocliente()
    {
        return view('admin.visaocliente');
    }
    public function visaodistribuidor()
    {
        return view('admin.visaodistribuidor');
    }
    public function calculadistanica()
    {
      return null;
    }
}
