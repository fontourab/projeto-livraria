@extends('layouts.model')
@section('titulo', 'Editar Autor')

@section('content')
<div class="container">
    <h1 class="mt-5"> Editar Autor </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('autor.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('autor.update', $autor->id) }}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $autor->nome }}" required> <br>
                <label for=""> Data de Nascimento: </label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ $autor->data_nascimento }}" required> <br>
                <label for=""> Nacionalidade: </label>
                <input type="text" name="nacionalidade" id="nacionalidade" class="form-control" value="{{ $autor->nacionalidade }}" required>
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