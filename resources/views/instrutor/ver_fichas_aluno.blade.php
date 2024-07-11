@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fichas de: {{ $aluno->user->name }}</title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Fichas de: {{ $aluno->user->name }}</h1>
                        </div>
                        <div class="card-body">
                            @foreach ($aluno->fichas as $ficha)
                                <div class="card mb-4">
                                    <div class="card-header" style="background-color: rgb(16, 125, 161); border-color: rgb(16, 125, 161); color: white">
                                        Detalhes da Ficha
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Ficha: </strong>{{ $ficha->descricao }}</p>
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
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('Ficha.edit', $ficha->id) }}" class="btn btn-warning me-2">Editar</a>
                                        
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $aluno->id }}">
                                                Deletar
                                            </button>
                                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmModal{{ $aluno->id }}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmModalLabel">Deletar</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tem certeza de que deseja deletar esta ficha?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button  class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('Ficha.delete', $ficha->id) }}" method="GET">
                                                                @csrf
                                                                <button  class="btn btn-danger">Deletar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
