<!DOCTYPE html>
<html lang="pt-BR">
<!-- resources/views/Aluno/index.blade.php -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    @include('scripts')
    <style>
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
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
                            <h1 class="text-center mb-1 display-6">Alunos</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Aluno.index') }}" method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control rounded-pill" placeholder="Buscar por nomes...">
                                    <button style="margin-left: 10px">Buscar</button>
                                </div>
                            </form>

                            @if ($alunos->count())
                                <table class="table" id="alunoTable">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alunos as $aluno)
                                            <tr>
                                                <td>{{ $aluno->user->name }}</td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('instrutor.ver_fichas_aluno', $aluno->id) }}" class="btn btn-primary" role="button">
                                                          Fichas
                                                        </a>
                                                        <a href="{{ route('Aluno.edit', $aluno->id) }}" class="btn btn-warning" role="button">
                                                            Editar
                                                        </a>
                                                        <button  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $aluno->id }}">
                                                            Deletar
                                                        </button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="confirmModal{{ $aluno->id }}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="confirmModalLabel">Deletar aluno</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Tem certeza de que deseja deletar este aluno?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    <form action="{{ route('Aluno.delete', $aluno->id) }}" method="GET">
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
                                {{ $alunos->links() }}
                            @else
                                <p>{{ __('Nenhum aluno encontrado.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>

</html>
