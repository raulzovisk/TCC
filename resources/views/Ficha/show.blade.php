@php
    use Carbon\Carbon;
@endphp
@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Ficha: {{ $ficha->nome }}</h6>
            <button onclick="history.back()" class="btn btn-primary ml-auto">Voltar</button>
        </div>
        <div class="card-body">
            <p><strong>Ficha: </strong>{{ $ficha->nome }} </p>
            <p><strong>Descrição:</strong> {{ $ficha->descricao }}</p>
            <p><strong>Data:</strong> {{ Carbon::parse($ficha->data)->format('d/m/Y') }}</p>
            <p><strong>Aluno:</strong> {{ $ficha->aluno->user->name }}</p>

            <hr>

            <h4>Exercícios:</h4>
            @foreach ($ficha->exercicios as $exercicio)
                <table class="table table-bordered mt-2 shadow-sm">
                    <thead>
                        <tr>
                            <th style="width: 75%; background-color: rgb(17, 143, 185); color:white">Nome</th>
                            <th style="width: 25%;background-color: rgb(17, 143, 185); color:white">Séries</th>
                            <th style="width: 25%;background-color: rgb(17, 143, 185); color:white">Repetições</th>
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
@endsection
