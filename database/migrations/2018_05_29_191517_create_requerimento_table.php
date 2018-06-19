<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimento', function (Blueprint $table) {
            $table->increments('idRequerimento');
            $table->string('qntIndividual');
            $table->string('qntCaixaMasterIndividual');
            $table->string('qntDisplay');
            $table->string('qntCaixaMasterDisplay');
            $table->string('qntSm');
            $table->string('qntCaixaMasterSm');
            $table->integer('idRecebedor')->foreign('fkIdRecebedor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('idEmissor')->foreign('fkIdEmissor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requerimento');
    }
}
