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
      return view('teste');
    }
}
