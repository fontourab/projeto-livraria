@extends('layouts.model')
@section('titulo', 'Ver Cliente')

@section('content')
<div class="container">
    <h1 class="mt-5"> Ver Cliente </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('cliente.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-3 text-right">
            <label for=""> NOME: </label> <br>
            <label for=""> RG: </label> <br>
            <label for=""> TELEFONE: </label>
        </div>
        <div class="col-8 text-left">
            <label> {{$cliente->nome}} </label> <br> 
            <label> {{$cliente->rg}} </label> <br> 
            <label> {{$cliente->telefone}} </label>
        </div>
    </div>
</div>
@endsection