<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValorProduto extends Model
{
    //
    protected $table = "valorproduto";

    protected $fillable = [
        'idProduto', 'valor'
    ];
}
