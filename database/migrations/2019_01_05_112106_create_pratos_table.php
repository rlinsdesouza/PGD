<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->text('receita');
            $table->integer('dificuldade');
            $table->integer('tempoProduzir');
            $table->enum('lactose',['S','N']);
            $table->enum('gluten',['S','N']);
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
        Schema::dropIfExists('pratos');
    }
}
