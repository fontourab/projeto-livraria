@extends('layouts.model')
@section('titulo', 'Editar Cliente')

@section('content')
<div class="container">
    <h1 class="mt-5"> Editar Cliente </h1>

    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('cliente.index') }}">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="row mt-5">
            <div class="col-12">
                <label for=""> Nome: </label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $cliente->nome }}" required> <br>
                <label for=""> RG: </label>
                <input type="text" maxlength="9" minlength="9" name="rg" id="rg" class="form-control" value="{{ $cliente->rg }}" required> <br>
                <label for=""> Telefone: </label>
                <input type="phone" name="telefone" id="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
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