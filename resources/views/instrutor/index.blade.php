@extends('layout')
@section('content')
    <div class="card shadow mb-4 table-responsive">
        <div class="card-header d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Instrutores</h6>
            <a href="{{ route('Instrutor.create') }}" class="btn btn-success ml-auto">Cadastrar Instrutor</a>
        </div>
        <div class="card-body table-responsive">


            <form action="{{ route('Instrutor.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Buscar por nomes...">
                </div>
            </form>


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

            @if ($instrutores->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th style="width: 280px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instrutores as $instrutor)
                            <tr>
                                <td>{{ $instrutor->id }}</td>
                                <td>{{ $instrutor->user->name }}</td>
                                <td>{{ $instrutor->user->email }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $instrutor->id }}">
                                            Deletar
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <form action="{{ route('Instrutor.delete', $instrutor->id) }}" method="GET">
                                        @csrf
                                        <div class="modal fade" id="deleteModal{{ $instrutor->id }}" tabindex="-1"
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $instrutores->links() }}
            @else
                <p>{{ __('Nenhum instrutor encontrado.') }}</p>
                
            @endif
        </div>
    </div>
@endsection
