<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduzidosTable extends Migration
{
    /**
     * Run the migrations.
     *https://www.easylaravelbook.com/blog/overriding-a-laravel-models-default-table-name/
     * @return void
     */
    public function up()
    {
        Schema::create('produzidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prato_id')->unsigned();
            $table->integer('producao_id')->unsigned();
            $table->unique(['prato_id','producao_id']);
            $table->foreign('prato_id')->references('id')->on('pratos');
            $table->foreign('producao_id')->references('id')->on('producaos')->onDelete('cascade');            
            $table->timestamps();
        });

        Schema::rename('produzidos', 'prato_producao');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produzidos');
    }
}
