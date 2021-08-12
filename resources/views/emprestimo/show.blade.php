@extends('layouts.model')
@section('titulo', 'Ver Emprestimo')

@section('content')
<div class="container">
    <h1 class="mt-5"> Ver Emprestimo </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('emprestimo.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-3 text-right">
            <label for=""> LIVRO: </label> <br>
            <label for=""> CLIENTE: </label> <br>
            <label for=""> FUNCIONÁRIO: </label> <br>
            <label for=""> SITUAÇÃO: </label> <br>
            <label for=""> DATA DE DEVOLUÇÃO: </label>
        </div>
        <div class="col-8 text-left">
            <label> {{$emprestimo->livro}} </label> <br> 
            <label> {{$emprestimo->cliente}} </label> <br>
            <label> {{$emprestimo->funcionario}} </label> <br>
            <label> {{$emprestimo->situacao_txt}} </label> <br>
            <label> {{$emprestimo->data_devolucao}} </label>
        </div>
    </div>
</div>
@endsection