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
                        <div class="card-header">
                            <h1 class="text-center mb-1 display-6">Cadastrar</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Aluno.list') }}" method="GET">
                                <input type="text" name="search" class="rounded-pill mb-1"
                                    placeholder="Buscar por nomes..">
                                <input type="submit" value="Buscar">
                            </form>

                            @if ($users->count())
                                <table class="table" id="alunoTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Cadastrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <a style="color: rgb(16, 125, 161); font-weight: 500"
                                                        href="{{ route('Aluno.create', ['id' => $user->id]) }}">Cadastrar
                                                        como
                                                        Aluno</a>
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

    @if (session('success'))
        <div class="alert alert-success w-25 position-fixed bottom-0 end-0 m-3" role="alert" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <script>
        $(document).ready(function() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    </script>
</body>

</html>
