<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            //Dados cliente
            $table->string('name', 50);
            $table->string('telefone', 15)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('rua', 50)->nullable();
            $table->string('numero', 7)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('estado', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            //$table->string('imagem', 100);

            //Dados de acesso
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
