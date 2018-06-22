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

           	set @qntEmissorAtual = (select qntOrcPed from users, orcamento
              where orcamento.idorcamento = id
              and users.id = orcamento.idEmissor
            );
            set @qntRecebedorAtual = (select qntOrcRec from users, orcamento
              where orcamento.idorcamento = id
              and users.id = orcamento.idRecebedor);

             UPDATE users SET qntOrcPed = @qntEmissorAtual + 1
             WHERE id = idEmissor;
             UPDATE users SET qntOrcRec = @qntRecebedorAtual + 1
             WHERE id = idRecebedor;
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
