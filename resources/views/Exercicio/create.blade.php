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

        .exercicio-img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 5px;
        }
    </style>

    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Exercícios</h6>
            <a href="{{ route('Categoria.index') }}" class="btn btn-success btn-sm ml-auto">Criar Categoria</a>
        </div>

        <div class="card-body table-responsive">

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There are some problems with your input. <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success" id="success-alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif
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
                                            <table style="background-color: white" class="table table-bordered mt-2">
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
                                                        <td>
                                                        <img src="{{ asset('storage/img_itens/' . $exercicio->img_itens) }}" alt="Imagem do exercício" class="exercicio-img">

                                                            {{ $exercicio->nome }}
                                                        </td>
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
                                                                <div class="modal fade"
                                                                    id="deleteModal{{ $exercicio->id }}" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
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
                                            <form action="{{ route('Exercicio.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <input type="text" name="nome" class="form-control mb-2"
                                                        id="nomeExercicio{{ $categoria->id }}" placeholder="Digite o nome do exercício" required>
                                                    <div class="custom-file">
                                                        <input type="file" name="img_itens" id="img_itens{{ $categoria->id }}" 
                                                            class="custom-file-input" required>
                                                        <label class="custom-file-label" for="img_itens{{ $categoria->id }}">
                                                            Escolher arquivo
                                                        </label>
                                                    </div>
                                                    <input type="hidden" name="id_categoria" value="{{ $categoria->id }}">
                                                    <div class="input-group-append mt-2">
                                                        <button style="margin-left: 5px" type="submit" class="btn btn-outline-secondary">
                                                            Confirmar
                                                        </button>
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            onclick="cancelarExercicio({{ $categoria->id }})">Cancelar</button>
                                                    </div>
                                                </div>
                                            </form>
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

        function cancelarExercicio(categoriaId) {
            $('#campoAdicionar' + categoriaId).slideUp();
        }

        function toggleDropdown(id) {
            let dropdown = $('#' + id);
            dropdown.slideToggle(300); // Tempo da animação em milissegundos
        }
    </script>
@endsection
