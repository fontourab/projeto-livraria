@extends('layouts.model')
@section('titulo', 'Editar Funcionário')

@section('content')
<div class="container">
    <h1 class="mt-5"> Editar Funcionário </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('funcionario.index') }}">
                <button class="btn btn-outline-secondary">Voltar</button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('funcionario.update', $funcionario->id) }}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Matrícula: </label>
                <input type="text" maxlength="5" minlength="4" name="matricula" id="matricula" class="form-control" value="{{ $funcionario->matricula }}" required> <br>
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $funcionario->nome }}" required> <br>
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