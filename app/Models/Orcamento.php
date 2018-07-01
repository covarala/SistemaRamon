<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Orcamento extends Model
{
    //
    use Notifiable;

    protected $table = "orcamento";

    protected $fillable = [
        'qntIndividual', 'qntCaixaMasterIndividual',
        'qntDisplay', 'qntCaixaMasterDisplay',
        'qntSm', 'qntCaixaMasterSm',
        'idRecebedor','idEmissor',
        'aprovacao','valor',
    ];
}
