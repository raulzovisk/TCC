<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
    @include('scripts')
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
</head>

<body>

    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Exercícios</h1>
                        </div>
                        <div class="card-body">
                            @foreach ($categorias as $categoria)
                                <div class="categoria mb-3" id="categoria{{ $categoria->id }}">
                                    <div class="card-header text-white"
                                        style="background-color: rgb(17, 138, 178); cursor: pointer;"
                                        onclick="toggleDropdown('dropdownCategoria{{ $categoria->id }}')">
                                        {{ $categoria->nome }}</div>
                                    <div class="dropdown bg-light rounded border"
                                        id="dropdownCategoria{{ $categoria->id }}"
                                        style="display: none; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); padding: 10px;">
                                        <ul class="list-unstyled mb-0">

                                            @foreach ($categoria->exercicios as $exercicio)
                                                <li>
                                                    <table class="table table-bordered mt-2">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 75%;">Nome</th>
                                                                <th style="width: 25%;">Ações</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $exercicio->nome }}</td>
                                                                <td>
                                                                    <button class="btn btn-sm btn-primary"
                                                                        ({{ $exercicio->id }}) ">Editar</button>
                                                                <button class="btn btn-sm btn-danger"
                                                                    ({{ $exercicio->id }})">Excluir</button>
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
                                                        <button style="margin-left: 5px"
                                                            class="btn btn-outline-secondary"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>

</html>
