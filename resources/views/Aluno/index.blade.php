<!DOCTYPE html>
<html lang="pt-BR">
<!-- resources/views/Aluno/index.blade.php -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    @include('scripts')
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
                            <form action="{{ route('Aluno.index') }}" method="GET">
                                <input type="text" name="search" class="rounded-pill mb-1"
                                    placeholder="Buscar por nomes..">
                                <input type="submit" value="Buscar">
                            </form>

                            @if ($alunos->count())
                                <table class="table" id="alunoTable">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Fichas</th>
                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alunos as $aluno)
                                            <tr>
                                                <td>{{ $aluno->user->name }}</td>
                                                <td>
                                                    <button>
                                                        <a href="{{ route('instrutor.ver_fichas_aluno', $aluno->id) }}"
                                                            style="display: flex; align-items: center; color: rgb(16, 125, 161); font-weight: 500">
                                                            <span>Ver Fichas</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-align-box-left-stretch"
                                                                style="margin-left: 10px">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                                                <path d="M9 17h-2" />
                                                                <path d="M13 12h-6" />
                                                                <path d="M11 7h-4" />
                                                            </svg>

                                                        </a>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button>
                                                        <a href="{{ route('Aluno.edit', $aluno->id) }}"
                                                            style="display: flex; align-items: center; color: #eca603; font-weight: 500">
                                                            <span>Editar</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
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
                                                    </button>
                                                </td>
                                                <td>
                                                    <form method="GET">
                                                        @csrf
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#confirmModal{{ $aluno->id }}"
                                                            style="display: flex; align-items: center; background: none; border: none; color: #BB2D3B; font-weight: 500">
                                                            <span>Deletar</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="#BB2D3B" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-unlink"
                                                                style="margin-left: 10px;">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M17 22v-2" />
                                                                <path d="M9 15l6 -6" />
                                                                <path
                                                                    d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                                                                <path
                                                                    d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                                                                <path d="M20 17h2" />
                                                                <path d="M2 7h2" />
                                                                <path d="M7 2v2" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="confirmModal{{ $aluno->id }}"
                                                        tabindex="-1" aria-labelledby="confirmModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="confirmModalLabel">
                                                                        Deletar aluno</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Tem certeza de que deseja deletar este aluno?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button  class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <form
                                                                        action="{{ route('Aluno.delete', $aluno->id) }}"
                                                                        method="GET">
                                                                        @csrf
                                                                        <button 
                                                                            class="btn btn-danger">Deletar</button>
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
