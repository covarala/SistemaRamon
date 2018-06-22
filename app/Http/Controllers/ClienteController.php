<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

class ClienteController extends Controller
{
    //
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function teste()
    {
      // code...
      $teste = Users::find('1')->first();
      dd($teste);
    }
}
