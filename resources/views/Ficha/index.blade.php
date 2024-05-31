<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fichas</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
            Lista de Suas Fichas Disponíveis
        </div>
        <div class="card-body">
            @if ($fichas && $fichas->isEmpty())
                <p>Você não tem fichas disponíveis.</p>
            @elseif ($fichas)
                <ul>
                    @foreach ($fichas as $ficha)
                        <li>
                            <p>Ficha: {{ $ficha->descricao }}</p>
                            <p>Objetivo: {{ $ficha->objetivo }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Não foi possível carregar suas fichas.</p>
            @endif
        </div>
    </div>
</body>

</html>
