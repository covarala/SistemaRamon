<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qntIndividual')->default('0');
            $table->integer('qntCaixaMasterIndividual')->default('0');
            $table->integer('qntDisplay')->default('0');
            $table->integer('qntCaixaMasterDisplay')->default('0');
            $table->integer('qntSm')->default('0');
            $table->integer('qntCaixaMasterSm')->default('0');
            $table->integer('idRecebedor')->foreign('fkIdRecebedor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('idEmissor')->foreign('fkIdEmissor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('aprovacao')->default($value = false);
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
        Schema::dropIfExists('orcamento');
    }
}
