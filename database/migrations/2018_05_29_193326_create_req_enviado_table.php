<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReqEnviadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reqEnviado', function (Blueprint $table) {
          // $table->increments('id');
            $table->integer('user_id_enviou')->foreign('user_id_enviou')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('req_id')->foreign('req_id')->references('id')->on('requerimento')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['user_id_enviou', 'req_id']);

            $table->integer('user_id_recebeu')->foreign('user_id_recebeu')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('quemEnviouReq');
    }
}
