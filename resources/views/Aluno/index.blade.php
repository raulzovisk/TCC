@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Alunos</h6>
            <a href="{{ route('Aluno.list') }}" class="btn btn-success ml-auto">Cadastrar Alunos</a>
        </div>
        <div class="card-body">

            <form action="{{ route('Aluno.index') }}" method="GET" class="mb-3">
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

            @if ($alunos->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                            <tr>
                                <td>{{ $aluno->id }}</td>
                                <td>{{ $aluno->user->name }}</td>
                                <td>{{ $aluno->user->email }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('instrutor.ver_fichas_aluno', $aluno->id) }}"
                                            class="btn btn-primary" role="button">
                                            Fichas
                                        </a>
                                        <a href="{{ route('Aluno.edit', $aluno->id) }}" class="btn btn-warning"
                                            role="button">
                                            Editar
                                        </a>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $aluno->id }}">
                                            Deletar
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <form action="{{ route('Aluno.delete', $aluno->id) }}" method="GET">
                                        @csrf
                                        <div class="modal fade" id="deleteModal{{ $aluno->id }}" tabindex="-1"
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
                {{ $alunos->links() }}
            @else
                <p>{{ __('Nenhum aluno encontrado.') }}</p>
            @endif
        </div>
    </div>
@endsection
