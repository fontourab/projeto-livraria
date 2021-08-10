@extends('layouts.model')
@section('titulo', 'Empréstimos')

@section('extra-plugins')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div class="container">
    <h1 class="mt-5"> Empréstimos </h1>

    <div class="row mt-5">
        <div class="col-4">
            <a href="../index">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
        <div class="col-8 text-right">
            <a href="{{ route('emprestimo.create') }}">
                <button class="btn btn-success"> Realizar Empréstimo </button>
            </a>
        </div>
    </div>

    <br>

    <div class="row mt-5">
        <div class="col-12">
            <table class="table" id="tabela">
                <thead>
                    <th> # </th>
                    <th> Livro </th>
                    <th> Cliente </th>
                    <th class="text-center"> Situação </th>
                    <th colspan=3 class="text-center"> Opções </th>
                </thead>
                <tbody>
                    @foreach ($emprestimos as $emprestimo)
                        <tr>
                            <td>{{ $emprestimo->id }}</td>
                            <td>{{ $emprestimo->nome }}</td>
                            <td>{{ $emprestimo->genero }}</td>
                            <td>{{ $emprestimo->autor }}</td>
                            <td class="text-center">{{ $emprestimo->quantidade }}</td>
                            <td class="text-center">{{ $emprestimo->quantidade_atual }}</td>
                            <td>
                                <button class="btn btn-info form-control" id="ver" data-emprestimo="{{ $emprestimo->id }}"> Ver </button>
                            </td>
                            <td>
                                <button class="btn btn-warning form-control" id="editar" data-emprestimo="{{ $emprestimo->id }}"> Editar </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger form-control" id="apagar" data-emprestimo="{{ $emprestimo->id }}" 
                                    data-nome="{{ $emprestimo->nome }}"> Apagar </button>
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
            let id = $(this).data('livro');
            window.location.href = "/livro/" + id + "/edit";
        });

        $('#tabela tbody').on('click', '#ver', function () {
            let id = $(this).data('livro');
            window.location.href = "/livro/" + id + "/show";
        });

        $('#tabela tbody').on('click', '#apagar', function () {
            let id = $(this).data('livro');
            let livro = $(this).data('nome');
            let apagar = confirm('Deseja excluir o livro ' + livro + ' permanentemente?');

            if (apagar) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '/livro/destroy',
                    data: {
                        'id'    : id
                    },
                    success: function (data) {
                        if (data) {
                            window.location.reload();   
                        } else {
                            alert('Não foi possível excluir este livro, tente novamente mais tarde.');
                        }
                    }
                });
            }
        });
    });
</script>

@endsection