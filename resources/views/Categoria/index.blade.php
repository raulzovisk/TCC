<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    @include('scripts')
</head>
<body>

<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header">
                        <h1 class="text-center mb-1 display-6">Categorias</h1>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->nome }}</td>
                                        <td>
                                            <a href="{{ route('Categoria.edit', $categoria->id) }}"
                                                style="display: flex; align-items: center; color: #eca603; font-weight: 500">
                                                <span>Editar</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit"
                                                    style="margin-left: 10px;">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </a>
                                        </td>

                                       
                                        <td>
                                            <form method="GET">
                                                @csrf
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#confirmModal{{ $categoria->id }}"
                                                    style="display: flex; align-items: center; background: none; border: none; color: #BB2D3B; font-weight: 500">
                                                    <span>Excluir</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="#BB2D3B" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash" style="margin-left: 10px">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmModal{{ $categoria->id }}" tabindex="-1"
                                                aria-labelledby="confirmModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmModalLabel">Excluir
                                                                categoria</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tem certeza de que deseja excluir esta categoria?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button  class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <form id="deleteForm"
                                                                action="{{ route('Categoria.delete', $categoria->id) }}"
                                                                method="GET">
                                                                @csrf
                                                                <button 
                                                                    class="btn btn-danger">Excluir</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('Categoria.create') }}" class="btn btn-primary">Criar nova categoria</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</body>
</html>
