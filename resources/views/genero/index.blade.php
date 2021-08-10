@extends('layouts.model')
@section('titulo', 'Generos')

@section('extra-plugins')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div class="container">
    <h1 class="mt-5"> Gêneros </h1>

    <div class="row mt-5">
        <div class="col-4">
            <a href="../index">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
        <div class="col-8 text-right">
            <a href="{{ route('genero.create') }}">
                <button class="btn btn-success"> Cadastrar Gênero </button>
            </a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-12">
            <table class="table" id="tabela">
                <thead>
                    <th> # </th>
                    <th> Nome </th>
                    <th colspan=3 class="text-center"> Opções </th>
                </thead>
                <tbody>
                    @foreach ($generos as $genero)
                        <tr>
                            <td>{{ $genero->id }}</td>
                            <td>{{ $genero->nome }}</td>
                            <td>
                                <button class="btn btn-info form-control" id="ver" data-genero="{{ $genero->id }}"> Ver </button>
                            </td>
                            <td>
                                <button class="btn btn-warning form-control" id="editar" data-genero="{{ $genero->id }}"> Editar </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger form-control" id="apagar" data-genero="{{ $genero->id }}" data-nome="{{ $genero->nome }}"> Apagar </button>
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
            let id = $(this).data('genero');
            window.location.href = "/genero/" + id + "/edit";
        });

        $('#tabela tbody').on('click', '#ver', function () {
            let id = $(this).data('genero');
            window.location.href = "/genero/" + id + "/show";
        });

        $('#tabela tbody').on('click', '#apagar', function () {
            let id = $(this).data('genero');
            let genero = $(this).data('nome');
            let apagar = confirm('Deseja excluir o gênero ' + genero + ' permanentemente?');

            if (apagar) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '/genero/destroy',
                    data: {
                        'id'    : id
                    },
                    success: function (data) {
                        if (data) {
                            window.location.reload();
                        } else {
                            alert('Não foi possível excluir este gênero, tente novamente mais tarde.');
                        }
                    }
                });
            }
        });
    });
</script>

@endsection