<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Cadastrar</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Aluno.list') }}" method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control rounded" placeholder="Buscar por nomes...">
                                    <button style="margin-left: 10px"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg></button>
                                </div>
                            </form>

                            @if ($users->count())
                                <table class="table" id="alunoTable">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Cadastrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <a href="{{ route('Aluno.create', ['id' => $user->id]) }}" class="btn btn-outline-primary" role="button">
                                                        Cadastrar Aluno
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $users->links() }}
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
