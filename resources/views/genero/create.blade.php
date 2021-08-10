@extends('layouts.model')
@section('titulo', 'Cadastrar Gênero')

@section('content')
<div class="container">
    <h1 class="mt-5"> Cadastrar Gênero </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('genero.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('genero.store') }}">
        @csrf
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" required> <br>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success"> Cadastrar </button>
            </div>
        </div>
    </form>
</div>