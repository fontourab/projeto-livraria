@extends('layouts.model')
@section('titulo', 'Clientes')

@section('extra-plugins')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div class="container">
    <h1 class="mt-5"> Clientes </h1>

    <div class="row mt-5">
        <div class="col-4">
            <a href="../index">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
        <div class="col-8 text-right">
            <a href="{{ route('cliente.create') }}">
                <button class="btn btn-success"> Cadastrar Cliente </button>
            </a>
        </div>
    </div>

    <br>

    <div class="row mt-5">
        <div class="col-12">
            <table class="table" id="tabela">
                <thead>
                    <th> # </th>
                    <th> Nome </th>
                    <th> RG </th>
                    <th> Telefone </th>
                    <th colspan=3 class="text-center"> Opções </th>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->rg }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>
                                <button class="btn btn-info form-control" id="ver" data-cliente="{{ $cliente->id }}"> Ver </button>
                            </td>
                            <td>
                                <button class="btn btn-warning form-control" id="editar" data-cliente="{{ $cliente->id }}"> Editar </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger form-control" id="apagar" data-cliente="{{ $cliente->id }}" data-nome="{{ $cliente->nome }}"> Apagar </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabela tbody').on('click', '#editar', function () {
            let id = $(this).data('cliente');
            window.location.href = "/cliente/" + id + "/edit";
        });

        $('#tabela tbody').on('click', '#ver', function () {
            let id = $(this).data('cliente');
            window.location.href = "/cliente/" + id + "/show";
        });

        $('#tabela tbody').on('click', '#apagar', function () {
            let id = $(this).data('cliente');
            let cliente = $(this).data('nome');
            let apagar = confirm('Deseja excluir o cliente ' + cliente + ' permanentemente?');

            if (apagar) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '/cliente/destroy',
                    data: {
                        'id'    : id
                    },
                    success: function (data) {
                        if (data) {
                            window.location.reload();
                        } else {
                            alert('Não foi possível excluir este cliente, tente novamente mais tarde.');
                        }
                    }
                });
            }
        });
    });
</script>

@endsection