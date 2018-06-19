<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Juridica extends Model
{
    //
    use Notifiable;

    protected $table = "juridica";

    protected $fillable = [
        'cnpj', 'idUser',
      ];
}
