<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Telefone extends Model
{
    //
    use Notifiable;

    protected $table = "telefone";

    protected $fillable = [
        'idUser', 'telefone',
    ];
}
