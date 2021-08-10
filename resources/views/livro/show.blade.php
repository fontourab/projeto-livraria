@extends('layouts.model')
@section('titulo', 'Ver Livro')

@section('content')
<div class="container">
    <h1 class="mt-5"> Ver Livro </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('livro.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-3 text-right">
            <label for=""> NOME: </label> <br>
            <label for=""> GÊNERO: </label> <br>
            <label for=""> AUTOR: </label> <br>
            <label for=""> QUANTIDADE TOTAL: </label> <br>
            <label for=""> QUANTIDADE ATUAL: </label>
        </div>
        <div class="col-8 text-left">
            <label> {{$livro->nome}} </label> <br> 
            <label> {{$livro->genero}} </label> <br> 
            <label> {{$livro->autor}} </label> <br>
            <label> {{$livro->quantidade}} </label> <br>
            <label> {{$livro->quantidade_atual}} </label>
        </div>
    </div>
</div>
@endsection