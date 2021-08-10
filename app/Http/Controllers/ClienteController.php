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
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', compact('cliente'));
    }

    public function edit($id) {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);
        try {
            $cliente->update($request->all());
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('cliente.index');
    }

    public function destroy(Request $request) {
        $cliente = Cliente::findOrFail($request->id);
        try {
            $cliente->delete();
            $data = 1;
        } catch (PDOException $e) {
            return $e;
            $data = 0;
        }

        return json_encode($data);
    }
}