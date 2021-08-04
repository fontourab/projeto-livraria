@extends('layouts.model')
@section('titulo', 'Clientes')

@section('content')

<div class="container">
    <h1> Visualizar clientes </h1>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('cliente.create') }}">
                <button> Cadastrar Cliente </button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table" id="tabela">
                <thead>
                    <th> # </th>
                    <th> Nome </th>
                    <th> RG </th>
                    <th> Telefone </th>
                    <th> Opções </th>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->rg }}</td>
                            <td>{{ $cliente->telefone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>