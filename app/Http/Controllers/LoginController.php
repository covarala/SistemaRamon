<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
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
          return view('inicial', $request);
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


}
