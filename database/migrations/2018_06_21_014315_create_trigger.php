<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
  public function up()
{
    DB::unprepared('
    CREATE TRIGGER atualizaUser after insert ON requerimento
    FOR EACH ROW
    BEGIN
      call atualizaUserReq (new.idRecebedor, new.idEmissor, new.idRequerimento);
    END
    ');
  }

  public function down()
  {
      DB::unprepared('DROP TRIGGER `atualizaUser`');
  }
}
