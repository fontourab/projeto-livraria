<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration {
    public function up() {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome');
            $table->integer('genero_id')->unsigned();
            $table->integer('autor_id')->unsigned();
            $table->integer('quantidade');
            $table->integer('quantidade_atual');
            $table->timestamps();
        });

        Schema::table('livros', function (Blueprint $table) {
            $table->foreign('genero_id')->references('id')->on('generos')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('livros', function (Blueprint $table) {
            $table->foreign('autor_id')->references('id')->on('autores')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('livros');
    }
}
