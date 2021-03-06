@extends('layouts.model')
@section('titulo', 'Cadastrar Cliente')

@section('content')
<div class="container">
    <h1 class="mt-5"> Cadastrar Cliente </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('cliente.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('cliente.store') }}">
        @csrf
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" required> <br>
                <label for=""> RG: </label>
                <input type="text" maxlength="9" minlength="9" name="rg" id="rg" class="form-control" required> <br>
                <label for=""> Telefone: </label>
                <input type="phone" name="telefone" id="telefone" class="form-control" required>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success"> Cadastrar </button>
            </div>
        </div>
    </form>
</div>