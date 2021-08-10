@extends('layouts.model')
@section('titulo', 'Funcionários')

@section('extra-plugins')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div class="container">
    <h1 class="mt-5"> Funcionários </h1>

    <div class="row mt-5">
        <div class="col-4">
            <a href="../index">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
        <div class="col-8 text-right">
            <a href="{{ route('funcionario.create') }}">
                <button class="btn btn-success"> Cadastrar Funcionário </button>
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
                    <th> Matrícula </th>
                    <th colspan=2 class="text-center"> Opções </th>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->id }}</td>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->matricula }}</td>
                            <td>
                                <button class="btn btn-info form-control" id="ver" data-func="{{ $funcionario->id }}"> Ver </button>
                            </td>
                            <td>
                                <button class="btn btn-warning form-control" id="editar" data-func="{{ $funcionario->id }}"> Editar </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger form-control" id="apagar" data-func="{{ $funcionario->id }}" data-nome="{{ $funcionario->nome }}"> Apagar </button>
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
            let id = $(this).data('func');
            window.location.href = "/funcionario/" + id + "/edit";
        });

        $('#tabela tbody').on('click', '#ver', function () {
            let id = $(this).data('func');
            window.location.href = "/funcionario/" + id + "/show";
        });

        $('#tabela tbody').on('click', '#apagar', function () {
            let id = $(this).data('func');
            let funcionario = $(this).data('nome');
            let apagar = confirm('Deseja excluir o funcionario ' + funcionario + ' permanentemente?');

            if (apagar) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '/funcionario/destroy',
                    data: {
                        'id'    : id
                    },
                    success: function (data) {
                        if (data) {
                            window.location.reload();
                        } else {
                            alert('Não foi possível excluir este funcionário, tente novamente mais tarde.');
                        }
                    }
                });
            }
        });
    });
</script>

@endsection