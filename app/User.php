<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //

    protected $table = "users";

    protected $fillable = [
      'nome', 'sobrenome', 'email', 'password', 'tipoUsuario',
      'qntOrcRec','qntOrcPed',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
