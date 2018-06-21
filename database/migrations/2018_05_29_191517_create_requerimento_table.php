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
            $table->integer('qntIndividual')->default('0');
            $table->integer('qntCaixaMasterIndividual')->default('0');
            $table->integer('qntDisplay')->default('0');
            $table->integer('qntCaixaMasterDisplay')->default('0');
            $table->integer('qntSm')->default('0');
            $table->integer('qntCaixaMasterSm')->default('0');
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
