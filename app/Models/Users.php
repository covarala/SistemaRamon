<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Users extends Model
{
    //
    use Notifiable;
    protected $table = "users";

    protected $fillable = [
        'nome', 'sobrenome', 'email', 'password', 'tipoUsuario',
        'qntOrcRec','qntOrcPed',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teste()
    {
      echo "to aaqiu";
    }
}
