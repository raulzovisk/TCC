@php
    use Carbon\Carbon;
@endphp
@extends('layout')
@section('content')
    <div class="card shadow mb-4 table-responsive">
        <div class="card-header d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Ficha: {{ $ficha->nome }}</h6>
            <button onclick="history.back()" class="btn btn-primary ml-auto">Voltar</button>
        </div>
        <div class="card-body table-responsive">
            <p><strong>Ficha: </strong>{{ $ficha->nome }} </p>
            <p><strong>Descrição:</strong> {{ $ficha->descricao }}</p>
            <p><strong>Data:</strong> {{ Carbon::parse($ficha->data)->format('d/m/Y') }}</p>
            <p><strong>Aluno:</strong> {{ $ficha->aluno->user->name }}</p>

            <hr>

            <h4>Exercícios:</h4>
            @foreach ($ficha->exercicios as $exercicio)
                <table class="table table-bordered mt-2 shadow-sm">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 25%; ">
                                <img height="150px" src="{{ asset('storage/img_itens/' . $exercicio->img_itens) }}"
                                    alt="Imagem do exercício" class="exercicio-img">
                            </td>
                            <td>
                                <strong class="text-primary" style="font-size: 30px">{{ $exercicio->nome }}</strong>
                                <br>
                                Series:
                                {{ $exercicio->pivot->series ?? 'N/A' }} x
                                {{ $exercicio->pivot->repeticoes ?? 'N/A' }}
                                <br>
                                Observações:
                                {{ $exercicio->pivot->observacoes ?? 'N/A' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection
