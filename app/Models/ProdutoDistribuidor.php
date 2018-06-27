<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoDistribuidor extends Model
{
    //
    protected $table = "produtodistribuidor";

    protected $fillable = [
        'idProduto',
        'idJuridica',
        'qnt'
    ];
}
