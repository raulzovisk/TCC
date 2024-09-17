@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cadastro de Alunos</h6>
        </div>
        <div class="card-body">
            
            <div class="row" style="margin-top: 1rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Usuários</h2>
                    </div>
                </div>
            </div>
            <a href="{{ route('Aluno.index') }}" class="btn btn-primary mb-2">Voltar</a>
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

            <form action="{{ route('Aluno.list') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Buscar por nomes...">
                </div>
            </form>

            @if ($users->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('Aluno.create', ['id' => $user->id]) }}" class="btn btn-primary" role="button">
                                        Cadastrar Aluno
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            @else
                <p>{{ __('Nenhum aluno encontrado.') }}</p>
            @endif
        </div>
    </div>
@endsection
