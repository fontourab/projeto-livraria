<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration {
    public function up() {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('livro_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('funcionario_id')->unsigned();
            $table->date('data_devolucao');
            $table->integer('situacao');
            $table->timestamps();
        });

        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('livro_id')->references('id')->on('livros')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('emprestimos');
    }
}
