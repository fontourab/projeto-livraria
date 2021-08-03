<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteLivro extends Model {
    use HasFactory;

    protected $table = "cliente_livro";
    protected $fillable = ['livro_id', 'cliente_id', 'funcionario_id', 'data_devolucaco', 'situacao'];

    public function livros() {
        return $this->belongsToMany(Livro::class, 'livro_id', 'id')->withTimestamps();
    }

    public function clientes() {
        return $this->belongsToMany(Cliente::class, 'cliente_id', 'id')->withTimestamps();
    }

    public function funcionario() {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'id');
    }
}