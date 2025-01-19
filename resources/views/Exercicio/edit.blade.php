@extends('layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Exercício</h6>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Existem alguns problemas com a sua entrada.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('Exercicio.update', $exercicio->id) }}" enctype="multipart/form-data" class="was-validated">
                @csrf
                @method('put')
                <div class="mb-4">
                    <label for="nome" class="form-label">Nome do Exercício</label>
                    <input type="text" class="form-control rounded" id="nome" name="nome"
                        value="{{ $exercicio->nome }}" required>
                </div>

                <div class="mb-4">
                    <label for="img_itens" class="form-label">Imagem do Exercício</label>
                    <input type="file" class="form-control rounded" id="img_itens" name="img_itens">
                    <img src="{{ asset('storage/img_itens/' . $exercicio->img_itens) }}" alt="{{ $exercicio->nome }}" class="mt-2" style="max-width: 150px;">
                </div>

                <input type="hidden" name="id_categoria" value="{{ $exercicio->id_categoria }}">

                <div>
                    <button class="btn btn-primary">Salvar</button>
                    <button onclick="history.back()" class="btn btn-secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
