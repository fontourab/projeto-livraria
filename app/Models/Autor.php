<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Livro;

class Autor extends Model {
    use HasFactory;

    protected $table = "autores";
    protected $fillable = ['nome', 'data_nascimento', 'nacionalidade'];

    public function livros() {
        return $this->hasMany(Livro::class, 'autor_id', 'id');
    }
}