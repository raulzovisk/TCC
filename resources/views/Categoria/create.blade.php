<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Categoria</title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Criar Categoria</h1>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('Categoria.store') }}">
                                @csrf

                                <label for="nome">Nome da Categoria:</label><br>
                                <input class="form-control rounded " type="text" id="nome" name="nome"><br>

                                <div class="text-center">
                                    <button class="btn btn-success">Criar
                                        Categoria</button>
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
