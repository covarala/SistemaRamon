<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagensProdutos extends Model
{
    //
    protected $table = "imagensproduto";

    protected $fillable = [
        'idProduto', 'nomeHash',
        'extensao', 'nomeImagem',
        'diretorio',
    ];
}
