@extends('layouts.model')
@section('titulo', 'Cadastrar Autor')

@section('content')
<div class="container">
    <h1 class="mt-5"> Cadastrar Autor </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('autor.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('autor.store') }}">
        @csrf
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" required> <br>
                <label for=""> RG: </label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required> <br>
                <label for=""> Nacionalidade: </label>
                <input type="text" name="nacionalidade" id="nacionalidade" class="form-control" required>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success"> Cadastrar </button>
            </div>
        </div>
    </form>
</div>