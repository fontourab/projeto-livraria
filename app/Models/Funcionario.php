<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Livro;
use App\Models\Cliente;
use App\Models\ClienteLivro;

class Funcionario extends Model {
    use HasFactory;

    protected $table = "funcionarios";
    protected $fillable = ['matricula', 'nome'];

    public function emprestimos() {
        return $this->hasMany(ClienteLivro::class, 'funcionario_id', 'id');
    }
}