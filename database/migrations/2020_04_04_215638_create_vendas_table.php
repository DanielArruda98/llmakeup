<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_produto')->unique();
            $table->bigInteger('fk_funcionario')->unique();
            $table->integer('quantidade');

            $table->foreign('fk_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('fk_funcionario')->references('id')->on('funcionarios')->onDelete('cascade');
            
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
        Schema::dropIfExists('vendas');
    }
}
