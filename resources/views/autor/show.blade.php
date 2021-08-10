@extends('layouts.model')
@section('titulo', 'Ver Autor')

@section('content')
<div class="container">
    <h1 class="mt-5"> Ver Autor </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('autor.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-3 text-right">
            <label for=""> NOME: </label> <br>
            <label for=""> DATA DE NASCIMENTO: </label> <br>
            <label for=""> NACIONALIDADE: </label>
        </div>
        <div class="col-8 text-left">
            <label> {{$autor->nome}} </label> <br> 
            <label> {{$autor->data_nascimento}} </label> <br> 
            <label> {{$autor->nacionalidade}} </label>
        </div>
    </div>
</div>
@endsection