@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fichas</title>
    @include('scripts')
    <style>
        .ficha-header {
            background-color: rgb(17, 138, 178);
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 1.25rem;
            /* Aumenta o tamanho da fonte */
        }

        .ficha-body {
            padding: 10px;
        }

        .ficha-card {
            border-radius: 10px;
            overflow: hidden;
            /* Garante que os cantos arredondados fiquem visíveis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            /* Adiciona transição suave para o efeito de zoom */
            width: 200px;
            /* Largura fixa */
            height: 200px;
            /* Altura fixa */
            cursor: pointer;
        }

        .ficha-card:hover {
            transform: scale(1.05);
            /* Efeito de zoom */
        }

        .fichas-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header">
                            <h1 class="text-center mb-1 display-6">Fichas</h1>
                        </div>
                        <div class="card-body">
                            @if ($fichas && $fichas->isEmpty())
                                <p>Você não tem fichas disponíveis.</p>
                            @elseif ($fichas)
                                <div class="fichas-container">
                                    @foreach ($fichas as $ficha)
                                        <a href="{{ route('ficha.show', ['id' => $ficha->id]) }}"
                                            class="card ficha-card">
                                            <div class="ficha-header">
                                                {{ $ficha->descricao }}
                                            </div>
                                            <div class="ficha-body">
                                                <p>Objetivo: {{ $ficha->objetivo }}</p>
                                                <p>Data: {{ Carbon::parse($ficha->data)->format('d/m/Y') }}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <p>Não foi possível carregar suas fichas.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
