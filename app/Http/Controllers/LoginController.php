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

          if ($dadosBanco['tipousuario'] === 'admin') {
            $request->session()->put('tipousuario', $dadosBanco['tipousuario']);
            Auth::login($dadosBanco);
            return redirect('/admin/dashboard');
          }
          $request->session()->put('tipousuario', $dadosBanco['tipousuario']);
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
        foreach ($dados as $dado) {
          if ($dado === null) {
            if ($dado !== 'telefone' || $dado !== 'complemento') {

              return redirect()->route('registrar')->with('status', 'Campo obrigatório!')->withInput();
            }
          }
        }
        if ($dados['password'] == null || $dados['password_confirm'] == null) {
          return redirect()->route('registrar')->with('status-senha', 'Senha não pode ser nula!');
        }
        if ($dados['password'] !== $dados['password_confirm']) {
          return redirect()->route('registrar')->with('status-senha', 'Senhas diferentes!');
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

        if ($dadosUsers['tipousuario'] === 'distribuidor' || $dados['tipopessoa'] === 'juridica') {
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
        return redirect('/inicial');
        // return response()->json(['success' => true]);
      }

    public function deslogar()
    {


      if (Auth::check()){
        // se tem usuario logado.
        Auth::logout();
        session()->forget('email');
        session()->forget('nome');
        session()->forget('id');
      }
      session()->forget('email');
      session()->forget('nome');
      session()->forget('id');

      return redirect('/inicial');
    }

    public function atualizaDados(Request $request)
    {
      $dados = $request->all();

      if ($dados['tipousuario'] === 'juridica') {
        // code...
        $dadosJuridica = DadosUsuarioJuridica::where('email', '=', $dados['email']);
      }
      else {
        // code...
        if ($dados['tipousuario'] === 'fisica') {
        $dadosFisica = DadosUsuarioFisica::where('email', '=', $dados['email']);
      }
    }
    $dadosUsers = [
      'nome' => $dados['name'],
      'sobrenome' => $dados['sobrenome'],
      'password' => $dados['password'],
      'email' => $dados['email'],
      'tipousuario' => $dados['tipousuario'],
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
