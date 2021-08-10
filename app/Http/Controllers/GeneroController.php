<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genero;

class GeneroController extends Controller {

    public function index() {
        $generos = Genero::all();
        return view('genero.index', compact('generos'));
    }

    public function create() {
        return view('genero.create');
    }

    public function store(Request $request) {
        try{
            Genero::create([
                'nome'      => $request->nome
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('genero.index');
    }

    public function show($id) {
        $genero = Genero::findOrFail($id);
        return view('genero.show', compact('genero'));
    }

    public function edit($id) {
        $genero = Genero::findOrFail($id);
        return view('genero.edit', compact('genero'));
    }

    public function update(Request $request, $id) {
        $genero = Genero::findOrFail($id);
        try {
            $genero->update($request->all());
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('genero.index');
    }

    public function destroy(Request $request) {
        $genero = Genero::findOrFail($request->id);
        try {
            $genero->delete();
            $data = 1;
        } catch (PDOException $e) {
            return $e;
            $data = 0;
        }

        return json_encode($data);
    }
}