@extends('layouts.model')
@section('titulo', 'Empréstimos')

@section('extra-plugins')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div class="container">
    <h1 class="mt-5"> Empréstimos </h1>

    @if(Session::has('flash_message'))
        <div class="ml-5 mt-5 mr-5">
            <div class="alert {{ Session::get('flash_message')['class'] }} alert-dismissible fade show" role="alert">
                <div class="text-center">
                    {{ Session::get('flash_message')['msg'] }}
                </div>
            </div>
        </div>
    @endif

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
                    <th> Situação </th>
                    <th class="text-center"> Opção </th>
                    <th class="text-center"> Opção </th>
                    <th class="text-center"> Opção </th>
                </thead>
                <tbody>
                    @foreach ($emprestimos as $emprestimo)
                        <tr>
                            <td>{{ $emprestimo->id }}</td>
                            <td>{{ $emprestimo->livro }}</td>
                            <td>{{ $emprestimo->cliente }}</td>
                            <td>{{ $emprestimo->situacao_txt }}</td>
                            <td>
                                <button class="btn btn-info form-control" id="ver" data-emprestimo="{{ $emprestimo->id }}"> Ver </button>
                            </td>
                            <td>
                                <button class="btn btn-warning form-control" id="editar" data-emprestimo="{{ $emprestimo->id }}"> Editar </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger form-control" id="apagar" data-emprestimo="{{ $emprestimo->id }}" 
                                    data-emprestimo="{{ $emprestimo->id }}"> Apagar </button>
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
        var table = $('#tabela').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'colvis'
            ],
            "responsive": true,
            "scrollCollapse": true,
            "paging": false,
            "order": [
                [0, "asc"]
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json",
                "buttons": {
                    "colvis": 'Exibir'
                }
            },
            "lengthMenu": [
                [25, 50, 75, 100 - 1],
                ["25", "50", "75", "100", "Tudo"]
            ],
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5, 6 ],
                "className": "item align-middle"
            }],
        }); 

        $('#tabela tbody').on('click', '#editar', function () {
            let id = $(this).data('emprestimo');
            window.location.href = "/emprestimo/" + id + "/edit";
        });

        $('#tabela tbody').on('click', '#ver', function () {
            let id = $(this).data('emprestimo');
            window.location.href = "/emprestimo/" + id + "/show";
        });

        $('#tabela tbody').on('click', '#apagar', function () {
            let id = $(this).data('emprestimo');
            let apagar = confirm('Deseja excluir o empréstimo de número #' + id + ' permanentemente?');

            if (apagar) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '/emprestimo/destroy',
                    data: {
                        'id'    : id
                    },
                    success: function (data) {
                        if (data) {
                            window.location.reload();   
                        } else {
                            alert('Não foi possível excluir este empréstimo, tente novamente mais tarde.');
                        }
                    }
                });
            }
        });
    });
</script>

@endsection