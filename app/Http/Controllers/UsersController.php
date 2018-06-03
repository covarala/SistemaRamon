<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function veridicaLogin(Request $request)
    {
        //
        $dados = $request->all();
        $dadosBanco = Usuario::all()->where('email', $dados['email']);

    }

    public function create()
    {
        //
    }

    public function register(Request $request)
    {
        //
        $dados = $request->all();
        $dados['password'] = bcrypt($user['password']);
        dd($dados);
        User::create($dados);
        // return response()->json(['success' => true]);
    }

    public function show($id)
    {
        //
        if(Auth::check())//se tem usuario logado
        {
          $usuarioDados = Auth()->user()->all();
        }
        dd($usuarioDados);
        $dados = new User;
        $dados = User::where('email', $usuarioDados['email']);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
