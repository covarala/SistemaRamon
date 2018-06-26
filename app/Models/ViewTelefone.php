<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ViewTelefone extends Model
{
    //
    use Notifiable;
    protected $table = "telefonesusuarios";
}
