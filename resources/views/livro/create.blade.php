@extends('layouts.model')
@section('titulo', 'Cadastrar Livro')

@section('content')
<div class="container">
    <h1 class="mt-5"> Cadastrar Livro </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('livro.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('livro.store') }}">
        @csrf
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" required> <br>

                <div class="row">
                    <div class="col-6">
                        <label for=""> Gênero: </label>
                        <select name="genero_id" id="genero_id" class="form-control" required>
                            <option value=" "> Selecione... </option>
                            @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}"> {{ $genero->nome }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for=""> Autor: </label>
                        <select name="autor_id" id="autor_id" class="form-control" required>
                            <option value=" "> Selecione... </option>
                            @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}"> {{ $autor->nome }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <label for=""> Quantidade Total: </label>
                        <input type="number" maxlength="5" minlength="5" name="quantidade" id="quantidade" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label for=""> Quantidade Atual: </label>
                        <input type="number" maxlength="5" minlength="5" name="quantidade_atual" id="quantidade_atual" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success"> Cadastrar </button>
            </div>
        </div>
    </form>
</div>