<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Livro;

class Genero extends Model {
    use HasFactory;

    protected $table = "generos";
    protected $fillable = ['nome'];

    public function livros() {
        return $this->hasMany(Livro::class, 'genero_id', 'id');
    }
}