<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;
use App\Models\Genero;

class LivroController extends Controller {
    public function index() {
        $livros = Livro::all();
        return view('livro.index', compact('livros'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
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