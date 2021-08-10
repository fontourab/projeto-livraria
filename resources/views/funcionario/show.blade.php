@extends('layouts.model')
@section('titulo', 'Ver Funcionário')

@section('content')
<div class="container">
    <h1 class="mt-5"> Ver Funcionário </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('funcionario.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-3 text-right">
            <label for=""> MATRÍCULA: </label> <br>
            <label for=""> NOME: </label> 
        </div>
        <div class="col-8 text-left">
            <label> {{$funcionario->matricula}} </label> <br> 
            <label> {{$funcionario->nome}} </label>
        </div>
    </div>
</div>
@endsection