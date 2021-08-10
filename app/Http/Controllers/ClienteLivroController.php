<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Livro;
use App\Models\ClienteLivro;
use App\Models\Funcionario;

class ClienteLivroController extends Controller {
    public function index() {
        $emprestimos =  ClienteLivro::all();
        return view('emprestimo.index', compact('emprestimos'));
    }

    public function create() {
        $livros  = Livro::all();
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();

        return view('emprestimo.create', compact('livros', 'clientes', 'funcionarios'));
    }

    public function store(Request $request) {
        $hoje = date('Y-m-d');
        $novaData = date('Y-m-d', strtotime("+9 days",strtotime($hoje)));

        try{
            ClienteLivro::create([
                'livro_id'       => $request->livro_id,
                'cliente_id'     => $request->cliente_id,
                'funcionario_id' => $request->funcionario_id,
                'data_devolucao' => $hoje,
                'situacao'       => 1
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('cliente.index');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}