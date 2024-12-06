@php
    use Carbon\Carbon;
@endphp
@extends('layout')
@section('content')
    <style>
        .ficha-header {
            background-color: rgb(17, 138, 178);
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 1.25rem;
        }

        .ficha-body {
            padding: 10px;
        }

        .ficha-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            width: 200px;
            height: 200px;
            cursor: pointer;
        }

        .ficha-card:hover {
            transform: scale(1.05);
        }

        .fichas-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }   
    </style>

    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Fichas</h6>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    @if ($fichas && $fichas->isEmpty())
                        <p class="text-center">Você não tem fichas disponíveis.</p>
                    @elseif ($fichas)
                        <div class="fichas-container">
                            @foreach ($fichas as $ficha)
                                <a href="{{ route('ficha.show', ['id' => $ficha->id]) }}" class="card ficha-card">
                                    <div class="ficha-header">
                                        {{ $ficha->nome }}
                                    </div>
                                    <div class="ficha-body">
                                        <strong>Descrição: {{ $ficha->descricao }}</strong><br>
                                        <strong>Data: {{ Carbon::parse($ficha->data)->format('d/m/Y') }}</strong>
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
@endsection
