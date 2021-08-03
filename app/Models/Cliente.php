<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Livro;
use App\Models\Funcionario;

class Cliente extends Model {
    use HasFactory;

    protected $table = "clientes";
    protected $fillable = ['rg', 'nome', 'telefone'];

    public function livros() {
        return $this->belongsToMany(Livro::class);
    }
}