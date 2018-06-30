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
        Create view TotalProdutosOrcamentados AS(
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
          Create view dadosUsuarioFisica AS(
          SELECT
            fisica.idFisica,
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
          Create view dadosUsuarioJuridica AS(
            SELECT
            juridica.idJuridica,
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
          Create view telefonesUsuarios AS(
            SELECT users.nome, b.telefone, b.IdUser
            from users, telefone as b
            WHERE users.id = b.IdUser
            ORDER BY b.IdUser ASC
          );
        ');
          DB::unprepared('
          Create view qntProdutosDistribuidores AS(
            SELECT u.id as idUser, j.idJuridica, u.nome as nomeUser,
            u.qntOrcRec, prod.idProduto, prod.nome as nomeProduto,
            p.qnt as qntProdDist from juridica as j, users as u,
            produtodistribuidor as p, produto as prod
            where u.id = j.idUser AND p.idJuridica = j.idJuridica
            AND j.distribuidor = true
            AND prod.idProduto = p.idProduto
            ORDER BY idJuridica
          );
        ');
      }

      public function down()
      {
          DB::unprepared('DROP view `TotalProdutosOrcamentados`;');
          DB::unprepared('DROP view `dadosUsuarioFisica`;');
          DB::unprepared('DROP view `dadosUsuarioJuridica`;');
          DB::unprepared('DROP view `telefonesUsuarios`;');
          DB::unprepared('DROP view `qntProdutosDistribuidores`;');
      }
}
