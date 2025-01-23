@php
    use Carbon\Carbon;
@endphp
@extends('layout')
@section('content')
    <style>
        .ficha-header {
            background: linear-gradient(45deg, rgb(17, 138, 178), rgb(33, 194, 248));
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
        }

        .ficha-body {
            padding: 15px;
            font-size: 0.95rem;
            color: #555;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .ficha-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            background: white;
            display: flex;
            flex-direction: column;
            width: 220px;
            height: 250px;
            cursor: pointer;
            text-decoration: none;
        }

        .ficha-card:hover {
            transform: scale(1.08);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .fichas-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            padding: 20px 0;
        }

        .ficha-footer {
            margin-top: auto;
            padding: 10px;
            background: #f7f7f7;
            text-align: center;
            font-size: 0.85rem;
            color: #777;
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
                                <a href="{{ route('ficha.show', ['id' => $ficha->id]) }}" class="ficha-card">
                                    <div class="ficha-header">
                                        {{ $ficha->nome }}
                                    </div>
                                    <div class="ficha-body">
                                        <span><strong>Descrição:</strong> {{ $ficha->descricao }}</span>
                                        <span><strong>Data:</strong>
                                            {{ Carbon::parse($ficha->data)->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="ficha-footer">
                                        Clique para ver a ficha
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
