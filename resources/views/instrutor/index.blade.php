<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instrutores</title>
    @include('scripts')

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
                                <input type="text" name="search" class="rounded-pill mb-1"
                                    placeholder="Buscar por nomes..">
                                <input type="submit" value="Buscar">
                            </form>

                            <table class="table" id="instrutorTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Status</th>
                                        <th>Editar Status</th>
                                        <th>Desvincular Instrutor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instrutores as $instrutor)
                                        <tr>
                                            <td>{{ $instrutor->id }}</td>
                                            <td>{{ $instrutor->user->name }}</td>
                                            <td>{{ $instrutor->status }}</td>
                                            <td>
                                                <a href="{{ route('Instrutor.edit', $instrutor->id) }}"
                                                    style="display: flex; align-items: center; color: #eca603; font-weight: 500">
                                                    <span>Editar</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
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
                                                        data-bs-target="#confirmModal{{ $instrutor->id }}"
                                                        style="display: flex; align-items: center; background: none; border: none; color: #BB2D3B; font-weight: 500">
                                                        <span>Desvincular</span>
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
                                                <div class="modal fade" id="confirmModal{{ $instrutor->id }}"
                                                    tabindex="-1" aria-labelledby="confirmModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmModalLabel">
                                                                    Desvincular
                                                                    Instrutor</h5>

                                                            </div>
                                                            <div class="modal-body">
                                                                Tem certeza de que deseja desvincular este instrutor?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <form id="deleteForm"
                                                                    action="{{ route('Instrutor.delete', $instrutor->id) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <button class="btn btn-danger">Desvincular</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                        </tr>
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
