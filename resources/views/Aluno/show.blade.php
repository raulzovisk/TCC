<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            background: rgb(230, 229, 229);
            font-family: 'Montserrat', sans-serif;
        }


        .btn-warning {
            background-color: #FFCA2C !important;
        }

        .btn-warning:hover {
            background-color: #e4b424 !important;
        }
    </style>
</head>

<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-8 ">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-body">
                        <h1 class="text-center mb-4 display-6">Meus Dados</h1>
                        <div class="p-4">
                            <p><strong>Altura:</strong> {{ $aluno->altura }} cm</p>
                            <p><strong>Peso:</strong> {{ $aluno->peso }} kg</p>
                            <p><strong>Gênero:</strong> {{ $aluno->genero }}</p>
                            <p><strong>Percentual de Gordura:</strong> {{ $aluno->gordura }} %</p>
                            <p><strong>Massa Muscular:</strong> {{ $aluno->musculo }} kg</p>
                            <p><strong>Idade:</strong> {{ $aluno->idade }} anos</p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('Aluno.edit', $aluno->id) }}" type="submit" id="submitButton"
                                class="btn btn-warning">Editar Dados</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
