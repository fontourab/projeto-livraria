@extends('layouts.model')
@section('content')

<div class="container">
    <h1> Livraria </h1>

    <div class="row">
        <div class="col-3">
            <a href="{{ route('cliente.index') }}">
                <button class="btn btn-primary"> Clientes </button>
            </a> 
        </div>
        <div class="col-3">
            <button class="btn btn-primary"> Livros </button>
        </div>
        <div class="col-3">
            <button class="btn btn-primary"> Emprestimos </button>
        </div>
        <div class="col-3">
            <button class="btn btn-primary"> Funcionários </button>
        </div>
    </div>
</div>