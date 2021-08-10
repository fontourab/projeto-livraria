<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Autor;

class AutorController extends Controller {

    public function index() {
        $autores = Autor::all();
        return view('autor.index', compact('autores'));
    }

    public function create() {
        return view('autor.create');
    }

    public function store(Request $request) {
        try{
            Autor::create([
                'nome'            => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'nacionalidade'   => $request->nacionalidade
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('autor.index');
    }

    public function show($id) {
        $autor = Autor::findOrFail($id);
        return view('autor.show', compact('autor'));
    }

    public function edit($id) {
        $autor = Autor::findOrFail($id);
        return view('autor.edit', compact('autor'));
    }

    public function update(Request $request) {
        $autor = Autor::findOrFail($request->id);
        try {
            $autor->update($request->all());
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('autor.index');
    }

    public function destroy(Request $request) {
        $autor = Autor::findOrFail($request->id);
        try {
            $autor->delete();
            $data = 1;
        } catch (PDOException $e) {
            return $e;
            $data = 0;
        }

        return json_encode($data);
    }
}
