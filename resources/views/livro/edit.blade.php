@extends('layouts.model')
@section('titulo', 'Editar Livro')

@section('content')
<div class="container">
    <h1 class="mt-5"> Editar Livro </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('livro.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('livro.update', $livro->id) }}">
        @csrf
        <input type="hidden" name="_method" value="put">
        
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $livro->nome }}" required> <br>

                <div class="row">
                    <div class="col-6">
                        <label for=""> Gênero: </label>
                        <select name="genero_id" id="genero_id" class="form-control" value="{{ $livro->genero_id }}" required>
                            <option value="{{ $livro->genero_id }}"> {{ $livro->genero }} </option>
                            @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}"> {{ $genero->nome }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for=""> Autor: </label>
                        <select name="autor_id" id="autor_id" class="form-control" value="{{ $livro->autor_id }}" required>
                            <option value="{{ $livro->autor_id }}"> {{ $livro->autor }} </option>
                            @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}"> {{ $autor->nome }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <label for=""> Quantidade Total: </label>
                        <input type="number" maxlength="5" minlength="5" name="quantidade" id="quantidade" class="form-control" value="{{ $livro->quantidade }}" required>
                    </div>
                    <div class="col-6">
                        <label for=""> Quantidade Atual: </label>
                        <input type="number" maxlength="5" minlength="5" name="quantidade_atual" id="quantidade_atual" class="form-control" value="{{ $livro->quantidade_atual }}" required>
                    </div>
                </div>
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