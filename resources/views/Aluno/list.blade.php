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
                            <form action="{{ route('Aluno.list') }}" method="GET">
                                <input type="text" name="search" class="rounded-pill mb-1" placeholder="Buscar por nomes..">
                                <input type="submit" value="Buscar" >
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
                                                    <a href="{{ route('Aluno.create', ['id' => $user->id]) }}" class="btn btn-primary" role="button">
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
