<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\User;
use App\Models\Endereco;
use App\Models\Fisica;
use App\Models\Juridica;
use App\Models\Telefone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
      //
      $email =  $request->get('email');
      $password =  $request->get('password');

      $dadosBanco = User::where('email', '=' ,$email)->first();


      if ($email === $dadosBanco['email']) {
        // se existe Email
        if (Hash::check($password, $dadosBanco['password'])) {
          //check('senha para checar', 'senha ja com hash')
          $request->session()->put('email', $email);
          $request->session()->put('id', $dadosBanco['id']);
          $request->session()->put('nome', $dadosBanco['nome']);

          if ($dadosBanco['tipousuario'] === 'admin') {
            Auth::login($dadosBanco);
            return redirect('/admin/dashboard');
          }
          return redirect('/inicial');
        }else {
          return redirect()->route('entrar')->with('status', 'Email ou Senha Incorretos!');
        }
      }
      return redirect()->route('entrar')->with('status', 'Email ou Senha Incorretos!');
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
        foreach ($dados as $dado) {
          if ($dado === null) {
            if ($dado !== 'telefone' || $dado !== 'complemento') {

              return redirect()->route('registrar')->with('status', 'Campo obrigatório!')->withInput();
            }
          }
        }
        if ($dados['password'] !== $dados['password_confirm']) {
          return redirect()->route('registrar')->with('status', 'Senhas diferentes!');
        }
        $dados['password'] = Hash::make($dados['password']);
        $dadosBanco = Users::where('email', '=' ,$dados['email'])->first();
        if ($dados['email'] === $dadosBanco['email']) {
          return redirect()->route('registrar')->with('status', 'Email já cadastrado!');
        }

        $dadosUsers = [
          'nome' => $dados['name'],
          'sobrenome' => $dados['sobrenome'],
          'password' => $dados['password'],
          'email' => $dados['email'],
          'tipousuario' => $dados['tipousuario'],
        ];

        Users::create($dadosUsers);

        $dadosBanco = Users::where('email', $dados['email'])->first();
        $idUsers = $dadosBanco['id'];

        $dadosTel = [
          'telefone' => $dados['telefone'],
          'idUser' => $idUsers,
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
          'idUser' => $idUsers,
        ];

        Endereco::create($dadosEndereco);

        if ($dadosUsers['tipousuario'] === 'representante') {
          // code...
          $dadosJuridica = [
            'idUser' => $idUsers,
            'cnpj' => $dados['cnpj']
          ];
          Juridica::create($dadosJuridica);
        }
        if ($dados['tipopessoa'] === 'fisica') {
          // code...
          $dadosFisica = [
            'idUser' => $idUsers,
            'cpf' => $dados['cpf']
          ];
          Fisica::create($dadosFisica);
        }
        if ($dados['tipopessoa'] === 'juridica') {
          // code...
          $dadosJuridica = [
            'idUser' => $idUsers,
            'cnpj' => $dados['cnpj']
          ];
          Juridica::create($dadosJuridica);
        }
        return redirect('/inicial');
        // return response()->json(['success' => true]);
    }


}
