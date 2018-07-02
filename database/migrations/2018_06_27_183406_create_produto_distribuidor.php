<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoDistribuidor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('produtodistribuidor', function (Blueprint $table) {

        $table->increments('id');
        $table->integer('idJuridica')->foreign('idJuridica')->references('idJuridica')->on('juridica')->onDelete('cascade')->onUpdate('cascade');
        $table->integer('idProduto')->foreign('idProduto')->references('idProduto')->on('produto')->onDelete('cascade')->onUpdate('cascade');
        $table->integer('qnt')->default('0');
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
        //
        Schema::dropIfExists('produtodistribuidor');
    }
}
