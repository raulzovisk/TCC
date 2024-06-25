<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instrutores</title>
    @include('scripts')
    <style>
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header">
                            <h1 class="text-center mb-1 display-6">Instrutores</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Instrutor.index') }}" method="GET">
                                <input type="text" name="search" class="rounded-pill mb-1" placeholder="Buscar por nomes..">
                                <input type="submit" value="Buscar">
                            </form>

                            <table class="table" id="instrutorTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th class="text-end">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instrutores as $instrutor)
                                        <tr>
                                            <td>{{ $instrutor->id }}</td>
                                            <td>{{ $instrutor->user->name }}<span class="badge badge-secondary">{{ $instrutor->status }}</span></td>
                                            <td>
                                                <div class="action-buttons">
                                                    
                                                    <a href="{{ route('Instrutor.edit', $instrutor->id) }}" class="btn btn-warning">
                                                        Editar
                                                    </a>
                                                    <button  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $instrutor->id }}">
                                                        Desvincular
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="confirmModal{{ $instrutor->id }}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmModalLabel">Desvincular Instrutor</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tem certeza de que deseja desvincular este instrutor?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form id="deleteForm" action="{{ route('Instrutor.delete', $instrutor->id) }}" method="GET">
                                                            @csrf
                                                            <button class="btn btn-danger">Desvincular</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $instrutores->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>

</html>
