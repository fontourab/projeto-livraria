<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcionario;

class FuncionarioController extends Controller {

    public function index() {
        $funcionarios = Funcionario::all();
        return view('funcionario.index', compact('funcionarios'));
    }

    public function create() {
        return view('funcionario.create');
    }

    public function store(Request $request) {
        try{
            Funcionario::create([
                'matricula' => $request->matricula,
                'nome'      => $request->nome
            ]);
            \Session::flash('flash_message', [
                'msg'   => 'Funcionário criado com sucesso!',
                'class' => 'alert-success'
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('funcionario.index');
    }

    public function show($id) {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionario.show', compact('funcionario'));
    }

    public function edit($id) {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionario.edit', compact('funcionario'));
    }

    public function update(Request $request, $id) {
        $funcionario = Funcionario::findOrFail($id);
        try {
            $funcionario->update($request->all());
            \Session::flash('flash_message', [
                'msg'   => 'Funcionário editado com sucesso!',
                'class' => 'alert-success'
            ]);
        } catch (PDOException $e) {
            return $e;
        }
        return redirect()->route('funcionario.index');
    }

    public function destroy(Request $request) {
        $funcionario = Funcionario::findOrFail($request->id);
        try {
            $funcionario->delete();
            $data = 1;
            \Session::flash('flash_message', [
                'msg'   => 'Funcionário excluído com sucesso!',
                'class' => 'alert-danger'
            ]);
        } catch (PDOException $e) {
            return $e;
            $data = 0;
        }

        return json_encode($data);
    }
}