@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header  d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Categorias</h6>
            <a href="{{ route('Categoria.create') }}" class="btn btn-success btn-sm ml-auto">Criar Categoria</a>
        </div>
        <div class="card-body table-responsice">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There are some problems with your input. <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success" id="success-alert">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($categorias->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th style="width: 280px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('Categoria.edit', $categoria->id) }}" class="btn btn-warning btn-sm"
                                            role="button">
                                            Editar
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $categoria->id }}">
                                            Deletar
                                        </button>
                                    </div>
                                </td>
                                <!-- Modal -->
                                <form action="{{ route('Categoria.delete', $categoria->id) }}" method="GET">
                                    @csrf
                                    <div class="modal fade" id="deleteModal{{ $categoria->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Certeza em deletar?
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>{{ __('Nenhum categoria encontrado.') }}</p>
            @endif
        </div>
    </div>
@endsection
