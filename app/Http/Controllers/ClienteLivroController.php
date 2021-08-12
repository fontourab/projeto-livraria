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
        foreach ($emprestimos as $emprestimo) {
            $emprestimo->livro    = Livro::findOrFail($emprestimo->livro_id)->nome;
            $emprestimo->cliente  = Cliente::findOrFail($emprestimo->cliente_id)->nome;

            if ($emprestimo->situacao == 1) {
                $emprestimo->situacao_txt = "Pendente";
            } else if ($emprestimo->situacao == 2) {
                $emprestimo->situacao_txt = "Devolvido";
            }
        }
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
                'data_devolucao' => $novaData,
                'situacao'       => 1
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('emprestimo.index');
    }

    public function show($id) {
        $emprestimo = ClienteLivro::findOrFail($id);
        $livros   = Livro::all();
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();
        $emprestimo->livro    = Livro::findOrFail($emprestimo->livro_id)->nome;
        $emprestimo->cliente  = Cliente::findOrFail($emprestimo->cliente_id)->nome;
        $emprestimo->funcionario = Funcionario::findOrFail($emprestimo->funcionario_id)->nome;

        $emprestimo->data_devolucao = date('d/m/Y', strtotime($emprestimo->data_devolucao));

        if ($emprestimo->situacao == 1) {
            $emprestimo->situacao_txt = "Pendente";
        } else if ($emprestimo->situacao == 2) {
            $emprestimo->situacao_txt = "Devolvido";
        }

        return view('emprestimo.show', compact('emprestimo', 'livros', 'clientes', 'funcionarios'));

    }

    public function edit($id) {
        $emprestimo = ClienteLivro::findOrFail($id);
        $livros   = Livro::all();
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();
        $emprestimo->livro    = Livro::findOrFail($emprestimo->livro_id)->nome;
        $emprestimo->cliente  = Cliente::findOrFail($emprestimo->cliente_id)->nome;
        $emprestimo->funcionario = Funcionario::findOrFail($emprestimo->funcionario_id)->nome;

        if ($emprestimo->situacao == 1) {
            $emprestimo->situacao_txt = "Pendente";
        } else if ($emprestimo->situacao == 2) {
            $emprestimo->situacao_txt = "Devolvido";
        }

        return view('emprestimo.edit', compact('emprestimo', 'livros', 'clientes', 'funcionarios'));
    }

    public function update(Request $request, $id) {
        $emprestimo = ClienteLivro::findOrFail($id);
        try {
            $emprestimo->update($request->all());
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('emprestimo.index');
    }

    public function destroy(Request $request) {
        $emprestimo = ClienteLivro::findOrFail($request->id);
        try {
            $emprestimo->delete();
            $data = 1;
        } catch (PDOException $e) {
            return $e;
            $data = 0;
        }

        return json_encode($data);
    }
}