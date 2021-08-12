@extends('layouts.model')
@section('titulo', 'Editar Empréstimo')

@section('content')
<div class="container">
    <h1 class="mt-5"> Editar Empréstimo </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('emprestimo.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('emprestimo.update', $emprestimo->id) }}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Livro: </label>
                <select name="livro_id" id="livro_id" class="form-control" required>
                    <option value="{{ $emprestimo->livro_id }}"> {{ $emprestimo->livro }} </option>
                    @foreach ($livros as $livro)
                    <option value="{{ $livro->id }}"> {{ $livro->nome }} </option>
                    @endforeach
                </select>
                <br>
                <label for=""> Cliente: </label>
                <select name="cliente_id" id="cliente_id" class="form-control" required>
                    <option value="{{ $emprestimo->cliente_id }}"> {{ $emprestimo->cliente }} </option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}"> {{ $cliente->nome }} </option>
                    @endforeach
                </select>
                <br>
                <label for=""> Funcionário: </label>
                <select name="funcionario_id" id="funcionario_id" class="form-control" required>
                    <option value="{{ $emprestimo->funcionario_id }}"> {{ $emprestimo->funcionario }} </option>
                    @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}"> {{ $funcionario->nome }} </option>
                    @endforeach
                </select>
                <br>
                <label for=""> Situação: </label>
                <select name="situacao" id="situacao" class="form-control" required>
                    <option value="{{ $emprestimo->situacao }}"> {{ $emprestimo->situacao_txt }} </option>
                    <option value="1"> Pendente </option>
                    <option value="2"> Devolvido </option>
                </select>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success"> Editar </button>
            </div>
        </div>
    </form>
</div>
@endsection