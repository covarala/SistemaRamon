<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Fisica extends Model
{
    //
    use Notifiable;

    protected $table = "fisica";

    protected $fillable = [
      'cpf', 'idUser',
      ];
}
