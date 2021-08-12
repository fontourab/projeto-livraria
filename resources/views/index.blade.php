@extends('layouts.model')

@section('content')
<div class="container">
    <h1 class="mt-5"> Livraria </h1>
    <br>
    <div class="row">
        <div class="col-4">
            <a href="{{ route('cliente.index') }}">
                <button class="btn btn-secondary form-control"> Clientes </button>
            </a> 
        </div>
        <div class="col-4">
            <a href="{{ route('funcionario.index') }}">
                <button class="btn btn-secondary form-control"> Funcionários </button>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('genero.index') }}">
                <button class="btn btn-secondary form-control"> Gêneros </button>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <a href="{{ route('autor.index') }}">
                <button class="btn btn-secondary form-control"> Autores </button>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('livro.index') }}">
                <button class="btn btn-secondary form-control"> Livros </button>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('emprestimo.index') }}">
                <button class="btn btn-secondary form-control"> Empréstimos </button>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div id=imgprincipal>
            <img src="{!! asset('img/principal.jpg')!!}" />
        </div>
    </div>
</div>

@endsection