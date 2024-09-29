@extends('layout')
@section('content')
    <style>
        .categoria {
            border-radius: 10px;
            overflow: hidden;
            background-color: #f2f2f2;
        }

        .table td,
        .table th {
            width: 25%;
        }
    </style>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Exercícios</h6>
            <a href="{{ route('Categoria.create') }}" class="btn btn-success ml-auto">Criar Categoria</a>
        </div>

        <div class="card-body">
            <div class="card-body">
                @if ($categorias->isEmpty())
                    <p class="text-center">Nenhuma categoria disponível.</p>
                @else
                    @foreach ($categorias as $categoria)
                        <div class="categoria mb-3" id="categoria{{ $categoria->id }}">
                            <div class="card-header text-white"
                                style="background-color: rgb(17, 138, 178); cursor: pointer;"
                                onclick="toggleDropdown('dropdownCategoria{{ $categoria->id }}')">
                                {{ $categoria->nome }}</div>

                            <div class="dropdown bg-light rounded border" id="dropdownCategoria{{ $categoria->id }}"
                                style="display: none; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); padding: 10px;">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($categoria->exercicios as $exercicio)
                                        <li>
                                            <table class="table table-bordered mt-2">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 75%;">Nome
                                                        </th>
                                                        <th style="width: 25%;">Ações
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $exercicio->nome }}</td>
                                                        <td>
                                                            <a href="{{ route('Exercicio.edit', $exercicio->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                Editar
                                                            </a>
                                                            <button class="btn btn-sm btn-danger delete-button"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $exercicio->id }}">Excluir</button>

                                                            <!-- Modal -->
                                                            <form action="{{ route('Exercicio.delete', $exercicio->id) }}"
                                                                method="GET">
                                                                @csrf
                                                                <div class="modal fade" id="deleteModal{{ $exercicio->id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    Certeza em deletar?
                                                                                </h5>
                                                                                <button class="close" type="button"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Saiba que não poderá voltar atrás caso
                                                                                prossiga.
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"
                                                                                    data-dismiss="modal">Cancelar</button>
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">Deletar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    @endforeach
                                    <li id="campoAdicionar{{ $categoria->id }}" style="display: none;">
                                        <div class="input-group mb-3 align-items-center">
                                            <input type="text" class="form-control"
                                                id="nomeExercicio{{ $categoria->id }}"
                                                placeholder="Digite o nome do exercício">
                                            <div class="input-group-append">
                                                <button style="margin-left: 5px" class="btn btn-outline-secondary"
                                                    onclick="confirmarExercicio({{ $categoria->id }})">Confirmar</button>
                                                <button class="btn btn-outline-secondary"
                                                    onclick="cancelarExercicio({{ $categoria->id }})">Cancelar</button>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <button onclick="mostrarCampoAdicionar('{{ $categoria->id }}')"
                                            class="btn btn-primary">
                                            Adicionar Exercício
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script>
        function mostrarCampoAdicionar(categoriaId) {
            $('#campoAdicionar' + categoriaId).slideDown();
            $('#dropdownCategoria' + categoriaId).show();
        }

        function confirmarExercicio(categoriaId) {
            let nomeExercicio = $('#nomeExercicio' + categoriaId).val();
            if (nomeExercicio !== "") {
                $.ajax({
                    type: "POST",
                    url: "{{ route('Exercicio.store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        nome: nomeExercicio,
                        series: null,
                        repeticoes: null,
                        id_categoria: categoriaId
                    },
                    success: function(response) {
                        alert("Dados inseridos com sucesso!");
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                alert("Nome do exercício não pode ficar em branco.");
            }
        }

        function cancelarExercicio(categoriaId) {
            $('#campoAdicionar' + categoriaId).slideUp();
        }

        function toggleDropdown(id) {
            let dropdown = $('#' + id);
            dropdown.slideToggle(300); // Tempo da animação em milissegundos
        }
    </script>
@endsection
