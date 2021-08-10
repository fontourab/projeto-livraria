@extends('layouts.model')
@section('titulo', 'Editar Genêro')

@section('content')
<div class="container">
    <h1 class="mt-5"> Editar Genêro </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('genero.index') }}">
                <button class="btn btn-outline-secondary">Voltar</button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('genero.update', $genero->id) }}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $genero->nome }}" required> <br>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success"> Editar </button>
            </div>
        </div>
    </form>
</div>
@endsection