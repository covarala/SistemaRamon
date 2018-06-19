<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requerimento extends Model
{
    //
    use Notifiable;

    protected $table = "requerimento";

    protected $fillable = [
        'qntIndividual', 'qntCaixaMasterIndividual',
        'qntDisplay', 'qntCaixaMasterDisplay',
        'qntSm', 'qntCaixaMasterSm',
        'idRecebedor','idEmissor',
    ];
}
