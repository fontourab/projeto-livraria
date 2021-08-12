<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;

class LivroController extends Controller {
    public function index() {
        $livros = Livro::all();
        foreach ($livros as $livro) {
            $livro->genero = Genero::findOrFail($livro->genero_id)->nome;
            $livro->autor  = Autor::findOrFail($livro->autor_id)->nome;
        }
        return view('livro.index', compact('livros'));
    }

    public function create() {
        $generos = Genero::all();
        $autores = Autor::all();
        return view('livro.create', compact('generos', 'autores'));
    }

    public function store(Request $request) {
        try{
            Livro::create([
                'nome'             => $request->nome,
                'genero_id'        => $request->genero_id,
                'autor_id'         => $request->autor_id,
                'quantidade'       => $request->quantidade,
                'quantidade_atual' => $request->quantidade_atual
            ]);
            \Session::flash('flash_message', [
                'msg'   => 'Livro criado com sucesso!',
                'class' => 'alert-success'
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('livro.index');
    }

    public function show($id) {
        $livro = Livro::findOrFail($id);
        $generos = Genero::all();
        $autores = Autor::all();
        $livro->genero = Genero::findOrFail($livro->genero_id)->nome;
        $livro->autor  = Autor::findOrFail($livro->autor_id)->nome;

        return view('livro.show', compact('livro', 'generos', 'autores'));
    }

    public function edit($id) {
        $livro = Livro::findOrFail($id);
        $generos = Genero::all();
        $autores = Autor::all();
        $livro->genero = Genero::findOrFail($livro->genero_id)->nome;
        $livro->autor  = Autor::findOrFail($livro->autor_id)->nome;

        return view('livro.edit', compact('livro', 'generos', 'autores'));
    }

    public function update(Request $request, $id) {
        $livro = Livro::findOrFail($id);
        try {
            $livro->update($request->all());
            \Session::flash('flash_message', [
                'msg'   => 'Livro editado com sucesso!',
                'class' => 'alert-success'
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('livro.index');
    }

    public function destroy($id) {
        $livro = Livro::findOrFail($request->id);
        try {
            $livro->delete();
            $data = 1;
            \Session::flash('flash_message', [
                'msg'   => 'Livro excluído com sucesso!',
                'class' => 'alert-danger'
            ]);
        } catch (PDOException $e) {
            return $e;
            $data = 0;
        }

        return json_encode($data);
    }
}