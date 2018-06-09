<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    function representantes()
    {
        return view('comuns.representantes');
    }
    function sobre()
    {
        return view('comuns.sobre');
    }
    function detalhes()
    {
        return view('comuns.detalhes');
    }
}
