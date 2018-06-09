<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function veridicaLogin(Request $request)
    {
        //
        $dados = $request->all();
        // $dados['password'] = bcrypt($dados['password']);

        // $dadosBanco = Users::find(2);
        $dadosBanco = Users::where('email', $dados['email'])->first();

        //check('senha para checar', 'senha ja com hash')
        if (Hash::check($dados['password'], $dadosBanco['password'])) {

          // $tmp = compact('dadosBanco');
          // var_dump($tmp['dadosBanco'])->name;
          // exit;

          // criarSessao($tmp['dadosBanco']);

          return view('comuns.inicial', compact('dadosBanco'));
        }

    }

    public function criarSessao(Request $dados)
    {
      // code...
      $value = $request->session()->get('key');
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
        // $dadosUsers = new Users
        $dadosUsers = [
          'name' => $dados['name'],
          'password' => $dados['password'],
          'email' => $dados['email'],
          'tipousuario' => $dados['tipousuario'],
        ];

        // $dadosUsers->save();

        Users::create($dadosUsers);

        $dadosBanco = Users::where('email', $dados['email'])->first();
        $idUsers = $dadosBanco['id'];

        $dadosTel = [
          'user_id' => $idUsers,
          'telefone' => $dados['telefone']
        ];
        Telefone::create($dadosTel);


        $dadosEndereco = [
          'rua' => $dados['rua'],
          'numero' => $dados['numero'],
          'bairro' => $dados['bairro'],
          'cidade' => $dados['cidade'],
          'estado' => $dados['estado'],
          'complemento' => $dados['complemento'],
          'cep' => $dados['cep'],
          'user_id' => $idUsers,
        ];

        Endereco::create($dadosEndereco);

        if ($dadosUsers['tipousuario'] === 'representante') {
          // code...
        }
        if ($dadosUsers['tipousuario'] === 'fisica') {
          // code...
          $dadosFisica = [
            'user_id' => $idUsers,
            'cpf' => $dados['cpf']
          ];
          Fisica::create($dadosFisica);
        }
        if ($dadosUsers['tipousuario'] === 'juridica') {
          // code...
          $dadosJuridica = [
            'user_id' => $idUsers,
            'cnpj' => $dados['cnpj']
          ];
          Juridica::create($dadosJuridica);
        }
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
