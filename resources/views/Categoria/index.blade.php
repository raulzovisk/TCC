<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    @include('scripts')
</head>
<body>
    <style>
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
    </style>
<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header" style="background-color: white">
                        <h1 class="text-center mb-1 display-6">Categorias</h1>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->nome }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                
                                                <a href="{{ route('Categoria.edit', $categoria->id) }}"
                                                    class="btn btn-outline-warning" role="button">
                                                    Editar
                                                </a>
                                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmModal{{ $categoria->id }}">
                                                    Deletar
                                                </button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmModal{{ $categoria->id }}"
                                                tabindex="-1" aria-labelledby="confirmModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmModalLabel">
                                                                Deletar categoria</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tem certeza de que deseja deletar este categoria?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <form
                                                                action="{{ route('Categoria.delete', $categoria->id) }}"
                                                                method="GET">
                                                                @csrf
                                                                <button class="btn btn-danger">Deletar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
