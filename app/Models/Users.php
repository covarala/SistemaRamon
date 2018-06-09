<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Users extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'nome', 'email', 'password', 'tipousuario'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
