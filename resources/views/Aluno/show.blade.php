<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>
    @include('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <x-app-layout>
        <div class="container-fluid mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow mb-5 bg-white rounded">
                        <div class="card-body">
                            <h1 class="text-center mb-4 display-6">Meus Dados</h1>
                            <div class="p-4">
                                @if ($aluno)
                                    <p><strong>Altura:</strong> {{ $aluno->altura }} cm</p>
                                    <p><strong>Peso:</strong> {{ $aluno->peso }} kg</p>
                                    <p><strong>Gênero:</strong> {{ $aluno->genero }}</p>
                                    <p><strong>Percentual de Gordura:</strong> {{ $aluno->gordura }} %</p>
                                    <p><strong>Massa Muscular:</strong> {{ $aluno->musculo }} kg</p>
                                    <p><strong>Idade:</strong> {{ $aluno->idade }} anos</p>

                                    
                                @else
                                    <p class="text-center">Você não tem dados ainda. Aguarde o instrutor preenche-los.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
