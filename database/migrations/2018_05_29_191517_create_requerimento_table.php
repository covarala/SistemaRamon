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
            $table->increments('id');
            $table->string('qntIndividual');
            $table->string('qntCaixaMasterIndividual');
            $table->string('qntDisplay');
            $table->string('qntCaixaMasterDisplay');
            $table->string('qntSm');
            $table->string('qntCaixaMasterSm');
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
