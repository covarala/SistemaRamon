<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViews extends Migration
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
        Create view totalprodutosorcamentados AS(
            SELECT SUM(qntIndividual) as Individual,
            SUM(qntCaixaMasterIndividual) as CaixaMasterIndInvidual,
            SUM(qntDisplay) as Display,
            SUM(qntCaixaMasterDisplay) as CaixaMasterDisplay,
            SUM(qntSm) as SM,
            SUM(qntCaixaMasterSM) as CaixaMasterSM
            FROM orcamento
          );
          ');
          DB::unprepared('
          Create view dadosusuariofisica AS(
          SELECT
            fisica.id as idFisica,
            users.id as idUser,
            nome as Nome,
            email as Email,
            cpf as CPF,
            CONCAT(rua,", ", numero,", ",bairro,". ",cidade," - ",estado," ",complemento)
              as Endereco,
            rua as Rua,
            numero as Numero,
            bairro as Bairro,
            complemento as Complemento,
            cidade as Cidade,
            estado as Estado,
            cep as CEP
           FROM users, fisica, endereco
            WHERE (
            users.id = endereco.IdUser
            and users.id = fisica.IdUser )
            order by nome
          );
          ');
          DB::unprepared('
          Create view dadosusuariojuridica AS(
            SELECT
            juridica.id as idJuridica,
            users.id as idUser,
            nome as Nome,
            email as Email,
            CNPJ as CNPJ,
            inscricaoEstadual as InscricaoEstadual,
            CONCAT(rua,", ", numero,", ",bairro,". ",cidade," - ",estado," ",complemento)
              as Endereco,
            rua as Rua,
            numero as Numero,
            bairro as Bairro,
            complemento as Complemento,
            cidade as Cidade,
            estado as Estado,
            cep as CEP,
            distribuidor as Distribuidor
           FROM users, juridica, endereco
            WHERE (
            users.id = endereco.IdUser
            and users.id = juridica.IdUser
           )
            order by nome
          );
          ');
          DB::unprepared('
          Create view telefonesusuarios AS(
            SELECT users.nome, b.telefone, b.IdUser
            from users, telefone as b
            WHERE users.id = b.IdUser
            ORDER BY b.IdUser ASC
          );
        ');
          DB::unprepared('
          Create view qntprodutosdistribuidores AS(
            SELECT u.id as idUser, j.id as idJuridica, u.nome as nomeUser,
            u.qntOrcRec, prod.id as idProduto, prod.nome as nomeProduto,
            p.qnt as qntProdDist
            from juridica as j, users as u,
            produtodistribuidor as p, produto as prod
            where u.id = j.idUser AND p.id = j.id
            AND j.distribuidor = true
            AND prod.id = p.id
            ORDER BY u.nome
          );
        ');
      }

      public function down()
      {
          DB::unprepared('DROP view `totalprodutosorcamentados`;');
          DB::unprepared('DROP view `dadosusuarioFisica`;');
          DB::unprepared('DROP view `dadosusuariojuridica`;');
          DB::unprepared('DROP view `telefonesusuarios`;');
          DB::unprepared('DROP view `qntprodutosdistribuidores`;');
      }
}
