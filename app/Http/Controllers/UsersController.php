<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function create()
    {
        //
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
