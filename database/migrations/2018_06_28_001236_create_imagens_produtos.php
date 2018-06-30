<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagensProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('imagensproduto', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idProduto')->foreign('idProduto')->references('idProduto')->on('produto')->onDelete('cascade')->onUpdate('cascade');
        $table->string('extensao');
        $table->string('nomeHash');
        $table->string('nomeImagem');
        $table->string('diretorio');
        
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
        Schema::dropIfExists('imagensproduto');
    }
}
