@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha {{ $ficha->descricao }} </title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="card">
            <div class="card-header">
                Detalhes da Ficha
            </div>
            <div class="card-body">
                <p><strong>Ficha: </strong>{{ $ficha->descricao }} </p>
                <p><strong>Objetivo:</strong> {{ $ficha->objetivo }}</p>
                <p><strong>Data:</strong> {{ Carbon::parse($ficha->data)->format('d/m/Y') }}</p>
                <p><strong>Aluno:</strong> {{ $ficha->aluno->user->name }}</p>

                <hr>

                <h4>Exercícios:</h4>
                @foreach ($ficha->exercicios as $exercicio)
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th style="width: 75%;">Nome</th>
                                <th style="width: 25%;">Séries</th>
                                <th style="width: 25%;">Repetições</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $exercicio->nome }}</td>
                                <td>{{ $exercicio->pivot->series ?? 'N/A' }}</td>
                                <td>{{ $exercicio->pivot->repeticoes ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </x-app-layout>

</body>

</html>
