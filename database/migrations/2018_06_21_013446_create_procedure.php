<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('
        CREATE PROCEDURE atualizaUserReq (
          IN idRecebedor int, in idEmissor int, in id int
        )
          BEGIN
            Declare qntEmissorAtual INT;
            Declare qntRecebedorAtual INT;

           	set @qntEmissorAtual = (select qntReqEnviado from users, requerimento
              where requerimento.idrequerimento = id
              and users.idUser = requerimento.idEmissor
            );
            set @qntRecebedorAtual = (select qntReqRecebido from users, requerimento
              where requerimento.idrequerimento = id
              and users.idUser = requerimento.idRecebedor);

             UPDATE users SET qntReqEnviado = @qntEmissorAtual + 1
             WHERE idUser = idEmissor;
             UPDATE users SET qntReqRecebido = @qntRecebedorAtual + 1
             WHERE idUser = idRecebedor;
          END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP PROCEDURE `atualizaUserReq`');
    }
}
