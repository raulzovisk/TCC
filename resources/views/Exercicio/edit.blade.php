<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Exercício</title>
    @include('scripts')
</head>

<body>

    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Editar Exercício</h1>
                        </div>
                        <div class="p-3">
                            <form method="POST" action="{{ route('Exercicio.update', $exercicio->id) }}">
                                @csrf
                                @method('put')
                                <div class="mb-2 ">
                                    <label for="nome" class="form-label">Nome do Exercício</label>
                                    <input type="text" class="form-control rounded" id="nome" name="nome"
                                        value="{{ $exercicio->nome }}" required>
                                </div>

                                <div>
                                    <button class="btn btn-primary">Salvar </button>
                                    <a href="{{ route('Exercicio.create') }}" class="btn btn-secondary">Cancelar </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>

</body>

</html>
