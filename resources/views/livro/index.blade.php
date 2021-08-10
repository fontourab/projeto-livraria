@extends('layouts.model')
@section('titulo', 'Livros')

@section('extra-plugins')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div class="container">
    <h1 class="mt-5"> Visualizar Livros </h1>

    <div class="row mt-5">
        <div class="col-4">
            <a href="../index">
                <button class="btn btn-outline-secondary"> Voltar </button>
            </a>
        </div>
        <div class="col-8 text-right">
            <a href="{{ route('cliente.create') }}">
                <button class="btn btn-success"> Cadastrar Livro </button>
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
                    <th> Gênero </th>
                    <th> Autor </th>
                    <th> Qtd Total </th>
                    <th> Qtd Atual </th>
                    <th colspan=2 class="text-center"> Opções </th>
                </thead>
                <tbody>
                    @foreach ($livros as $livro)
                        <tr>
                            <td>{{ $livro->id }}</td>
                            <td>{{ $livro->nome }}</td>
                            <td>{{ $livro->genero_id }}</td>
                            <td>{{ $livro->autor_id }}</td>
                            <td>{{ $livro->quantidade }}</td>
                            <td>{{ $livro->quantidade_atual }}</td>
                            <td>
                                <button class="btn btn-warning form-control" id="editar" data-livro="{{ $livro->id }}"> Editar </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger form-control" id="apagar" data-livro="{{ $livro->id }}" 
                                    data-nome="{{ $livro->nome }}"> Apagar </button>
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
                            alert('Não foi possível excluir este funcionário, tente novamente mais tarde.');
                        }
                    }
                });
            }
        });
    });
</script>

@endsection