<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration {
    public function up() {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('rg');
            $table->string('nome');
            $table->string('telefone');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('clientes');
    }
}
