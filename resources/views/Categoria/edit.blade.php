<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Categoria</title>
    @include('scripts')
</head>

<body>

    <x-app-layout>
        <div class="container-fluid mt-3 w-75">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body ">
                            <h1 class="text-center mb-4 display-6">Alterar Dados</h1>
                            <div class="p-3">
                                <form method="POST" action="{{ route('Categoria.update', $categoria->id) }}">
                                    @csrf
                                    @method('put')

                                    <div class="mb-2 ">
                                        <label for="nome" class="form-label">Nome da Categoria</label>
                                        <input type="text" class="form-control rounded" id="nome" name="nome"
                                            value="{{ $categoria->nome }}" required>
                                    </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success">Salvar Alterações</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </x-app-layout>

</body>

</html>
