<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Endereco extends Model
{
    //
    use Notifiable;

    protected $table = "endereco";

    protected $fillable = [
      'rua', 'numero',
      'bairro', 'cidade',
      'estado', 'complemento',
      'idUser', 'cep',
      ];
}
