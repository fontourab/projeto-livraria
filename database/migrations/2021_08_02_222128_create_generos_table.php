<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerosTable extends Migration {
    public function up() {
        Schema::create('generos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('generos');
    }
}
