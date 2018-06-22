<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    //
    use Notifiable;

    protected $table = "produto";

    protected $fillable = [
        'nome', 'descricao',
        'valor', 'idjuridica',
    ];
}
