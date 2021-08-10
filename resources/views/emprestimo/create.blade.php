@extends('layouts.model')
@section('titulo', 'Realizar Empréstimo')

@section('content')
<div class="container">
    <h1 class="mt-5"> Realizar Empréstimo </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('emprestimo.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('emprestimo.store') }}">
        @csrf
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Livro: </label>
                <select name="livro_id" id="livro_id" class="form-control" required>
                    <option value=" "> Selecione... </option>
                    @foreach ($livros as $livro)
                    <option value="{{ $livro->id }}"> {{ $livro->nome }} </option>
                    @endforeach
                </select>
                <br>
                <label for=""> Cliente: </label>
                <select name="cliente_id" id="cliente_id" class="form-control" required>
                    <option value=" "> Selecione... </option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}"> {{ $cliente->nome }} </option>
                    @endforeach
                </select>
                <br>
                <label for=""> Funcionário: </label>
                <select name="funcionario_id" id="funcionario_id" class="form-control" required>
                    <option value=" "> Selecione... </option>
                    @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}"> {{ $funcionario->nome }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success"> Cadastrar </button>
            </div>
        </div>
    </form>
</div>