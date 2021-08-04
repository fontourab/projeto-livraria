<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller {

    public function index() {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create() {
        return view('cliente.create');
    }

    public function store(Request $request) {
        try{
            Cliente::create([
                'nome'     => $request->nome,
                'rg'       => $request->rg,
                'telefone' => $request->telefone
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
