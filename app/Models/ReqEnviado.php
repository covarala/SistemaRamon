<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReqEnviado extends Model
{
    //
    use Notifiable;

    protected $table = "reqenviado";

    protected $fillable = [
        'user_id_enviou', 'user_id_recebeu',
    ];
}
