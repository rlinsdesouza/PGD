<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('notaSabor',8,2);
            $table->double('notaAparencia',8,2);
            $table->mediumText('justificativa');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')
            ->references('id')->on('pessoas')
            ->onDelete('cascade');
            $table->integer('producao_id')->unsigned();
            $table->foreign('producao_id')
            ->references('id')->on('producaos')
            ->onDelete('cascade');
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
        Schema::dropIfExists('avaliacaos');
    }
}
