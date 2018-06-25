<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        return view('admin.clientes');
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
