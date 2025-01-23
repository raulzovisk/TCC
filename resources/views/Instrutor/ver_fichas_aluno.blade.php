@extends('layout')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="card shadow mb-4">
        <div class="card-header  d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Fichas de: {{ $aluno->user->name }}</h6>
            <a href="{{route ('Aluno.index')}}" class="btn btn-primary ml-auto">Voltar</a>
        </div>

        <div class="col-md-12">
            <div class="card-body">
                @if ($aluno->fichas->isEmpty())
                    <p class="text-center">Nenhuma ficha disponível para este aluno.</p>
                @else
                    @foreach ($aluno->fichas as $ficha)
                        <div class="card mb-4">
                            <div class="card-header"
                                style="background-color: rgb(16, 125, 161); border-color: rgb(16, 125, 161); color: white">
                                Detalhes da Ficha
                            </div>
                            <div class="card-body">
                                <p><strong>Ficha: </strong>{{ $ficha->nome }}</p>
                                <p><strong>Objetivo:</strong> {{ $ficha->descricao }}</p>
                                <p><strong>Data:</strong> {{ Carbon::parse($ficha->data)->format('d/m/Y') }}</p>
                                <p><strong>Aluno:</strong> {{ $ficha->aluno->user->name }}</p>

                                <hr>

                                <h4>Exercícios:</h4>
                                @foreach ($ficha->exercicios as $exercicio)
                                    <table class="table table-responsive table-bordered mt-2">
                                        <thead>
                                            <tr>
                                                <th style="width: 50%;">Nome</th>
                                                <th style="width: 10%">Observações</th>
                                                <th style="width: 10%;">Séries</th>
                                                <th style="width: 10%;">Repetições</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $exercicio->nome }}</td>
                                                <td>{{ $exercicio->pivot->observacoes ?? 'N/A'}}</td>
                                                <td>{{ $exercicio->pivot->series ?? 'N/A' }}</td>
                                                <td>{{ $exercicio->pivot->repeticoes ?? 'N/A' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('Ficha.edit', $ficha->id) }}" class="btn btn-warning mr-2">Editar</a>

                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $ficha->id }}">
                                        Deletar
                                    </button>

                                    <!-- Modal -->
                                    <form action="{{ route('Ficha.delete', $ficha->id) }}" method="GET">
                                        @csrf
                                        <div class="modal fade" id="deleteModal{{ $ficha->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Certeza em
                                                            deletar?
                                                        </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Saiba que não poderá voltar atrás caso prossiga.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button class="btn btn-primary" type="submit">Deletar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
