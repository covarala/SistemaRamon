<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Telefone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
      //
      $email =  $request->get('email');
      $password =  $request->get('password');

      $dadosBanco = Users::where('email', '=' ,$email)->first();


      if ($email === $dadosBanco['email']) {
        // se existe Email
        if (Hash::check($password, $dadosBanco['password'])) {
          //check('senha para checar', 'senha ja com hash')
          $request->session()->put('email', $email);
          $request->session()->put('id', $dadosBanco['id']);

          if ($dadosBanco['tipousuario'] === 'admin') {
            return redirect('/home');
          }
          return redirect('/inicial');
        }else {
          return redirect('/entrar');
        }
      }
      return redirect('/entrar');
    }

    public function logout(Request $request)
    {
      $request->session()->flush();
      return redirect('/inicial');
    }

    public function register(Request $request)
    {
        //
        $dados = $request->all();
        $dados['password'] = bcrypt($dados['password']);

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
          'telefone' => $dados['telefone'],
          'user_id' => $idUsers,
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
          $dadosJuridica = [
            'user_id' => $idUsers,
            'cnpj' => $dados['cnpj']
          ];
          Juridica::create($dadosJuridica);
        }
        if ($dados['tipopessoa'] === 'fisica') {
          // code...
          $dadosFisica = [
            'user_id' => $idUsers,
            'cpf' => $dados['cpf']
          ];
          Fisica::create($dadosFisica);
        }
        if ($dados['tipopessoa'] === 'juridica') {
          // code...
          $dadosJuridica = [
            'user_id' => $idUsers,
            'cnpj' => $dados['cnpj']
          ];
          Juridica::create($dadosJuridica);
        }
        return redirect('/inicial');
        // return response()->json(['success' => true]);
    }



}
