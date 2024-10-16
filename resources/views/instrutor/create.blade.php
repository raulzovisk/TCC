@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Cadastrar Instrutor</h6>
            <button onclick="history.back()" class="btn btn-secondary ml-auto">Voltar</button>
        </div>
        <div class="card-body">
            
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

            <form action="{{ route('Instrutor.create') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Buscar por nomes...">
                </div>
            </form>

            @if ($users->count())
                <table class="table table-bordered" id="usuariosTable">
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
                                    <a class="btn btn-primary" role="button"
                                        href="{{ route('Instrutor.store', $user->id) }}">Atribuir como
                                        Instrutor</a>
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
