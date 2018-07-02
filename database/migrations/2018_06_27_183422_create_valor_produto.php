<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('valorproduto', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idProduto')->foreign('idProduto')->references('idProduto')->on('produto')->onDelete('cascade')->onUpdate('cascade');
        $table->decimal('valor', 10, 2)->default('0.00');
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
        Schema::dropIfExists('valorproduto');
    }
}
