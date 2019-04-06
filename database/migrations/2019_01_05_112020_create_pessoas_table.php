<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('apelido',100)->nullable();
            $table->string('cpf',11)->unique()->nullable();
            $table->string('telefone',14)->nullable();
            // $table->string('idbanco',4)->nullable();
            // $table->string('agencia',5)->nullable();
            // $table->string('operacao',3)->nullable();
            // $table->string('conta',14)->nullable();
            // $table->integer('banco_id')->unsigned()->nullable();
            // $table->foreign('banco_id')
            // ->references('id')->on('bancos')
            // ->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('pessoas');
    }
}
