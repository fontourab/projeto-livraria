<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoresTable extends Migration {
    public function up() {
        Schema::create('autores', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('nacionalidade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('autores');
    }
}