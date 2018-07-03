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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
      //
      $email =  $request->get('email');
      $password =  $request->get('password');

      $dadosBanco = User::where('email', '=' ,$email)->first();
      $request->session()->put('email');

      if ($email === $dadosBanco['email']) {
        // se existe Email
        if (Hash::check($password, $dadosBanco['password'])) {
          //check('senha para checar', 'senha ja com hash')
          $request->session()->put('email', $email);
          $request->session()->put('id', $dadosBanco['id']);
          $request->session()->put('nome', $dadosBanco['nome']);

          if ($dadosBanco['tipoUsuario'] === 'admin') {
            $request->session()->put('tipoUsuario', $dadosBanco['tipoUsuario']);
            Auth::login($dadosBanco);
            return redirect('/admin/dashboard');
          }
          if ($dadosBanco['tipoUsuario'] === 'distribuidor') {
            $request->session()->put('tipoUsuario', $dadosBanco['tipoUsuario']);
            return redirect('/distribuidor/inicial/'.$dadosBanco['id']);
          }
          $request->session()->put('tipoUsuario', $dadosBanco['tipoUsuario']);
          return redirect('/inicial');
        }else {

          return redirect()->route('entrar')->with('status', 'Email ou Senha Incorretos!');
        }

      }

      return redirect()->route('entrar')->with('status', 'Email ou Senha Incorretos!');
    }

    public function register(Request $request)
    {
        //
        $dados = $request->all();

        foreach ($dados as $dado => $value) {
          if ($value === null) {
            if (!strcmp($dado,"telefone") || !strcmp($dado,"complemento")) {
            }
            else {
              return redirect()->route('registrar')->with('status', 'Campo obrigatório!')->withInput();
            }
          }
        }
        if ($dados['password'] == null || $dados['password_confirm'] == null) {
          return redirect()->route('registrar')->with('status-senha', 'Senha não pode ser nula!');
        }
        if (strcmp($dados['password'], $dados['password_confirm'])) {
          return redirect()->route('registrar')->with('status-senha', 'Senhas diferentes!');
        }
        $dados['password'] = Hash::make($dados['password']);
        $dadosBanco = Users::where('email', '=' ,$dados['email'])->first();
        if ($dados['email'] === $dadosBanco['email']) {
          return redirect()->route('registrar')->with('status-email', 'Email já cadastrado!');
        }
        $dadosUsers = [
          'nome' => $dados['name'],
          'sobrenome' => $dados['sobrenome'],
          'password' => $dados['password'],
          'email' => $dados['email'],
          'tipoUsuario' => $dados['tipoUsuario'],
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


        if ($dadosUsers['tipoUsuario'] === 'distribuidor' || $dados['tipoPessoa'] === 'juridica') {
          $dadosJuridica = [
            'idUser' => $idUsers,
            'cnpj' => $dados['cnpj']
          ];
          Juridica::create($dadosJuridica);
        }
        if ($dados['tipoPessoa'] === 'fisica') {
          // code...
          $dadosFisica = [
            'idUser' => $idUsers,
            'cpf' => $dados['cpf']
          ];
          Fisica::create($dadosFisica);
        }
        return redirect('/inicial')->with('status-cadastro', 'Cadastro efetuado com sucesso!');
      }

    public function deslogar()
    {
      if (Auth::check()){
        // se tem usuario logado.
        Auth::logout();
        session()->flush();
        return redirect('/inicial');
      }
      session()->flush();

      return redirect('/inicial');
    }

    public function atualizaDados(Request $request)
    {
      $dados = $request->all();

      if ($dados['tipoUsuario'] === 'juridica') {
        // code...
        $dadosJuridica = DadosUsuarioJuridica::where('email', '=', $dados['email']);
      }
      else {
        // code...
        if ($dados['tipoUsuario'] === 'fisica') {
        $dadosFisica = DadosUsuarioFisica::where('email', '=', $dados['email']);
      }
    }
    $dadosUsers = [
      'nome' => $dados['name'],
      'sobrenome' => $dados['sobrenome'],
      'password' => $dados['password'],
      'email' => $dados['email'],
      'tipoUsuario' => $dados['tipoUsuario'],
    ];

    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // foreach ($dados as $dado => $value) {
    //   // code...
    //   if ($dadosUsers["$dado"] === $dado) {
    //     // code...
    //   }
    // }
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////
    // TERMINAR DE IMPLMENTAR/////////////////////////////////////////////////////

    $dadosTel = [
      'telefone' => $dados['telefone'],
      'idUser' => $idUsers,
    ];
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

    $dadosJuridica = [
        'idUser' => $idUsers,
        'cnpj' => $dados['cnpj']
      ];

    $dadosFisica = [
        'idUser' => $idUsers,
        'cpf' => $dados['cpf']
      ];





    }
}
