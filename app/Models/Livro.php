<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Genero;
use App\Models\Autor;
use App\Models\Cliente;

class Livro extends Model {
    use HasFactory;

    protected $table = "livros";
    protected $fillable = ['nome', 'genero_id', 'autor_id', 'quantidade', 'quantidade_atual'];

    public function genero() {
        return $this->belongsTo(Genero::class);
    }

    public function autor() {
        return $this->belongsTo(Autor::class);
    }

    public function clientes() {
        return $this->hasMany(Cliente::class);
    }
}
