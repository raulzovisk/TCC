@extends('layout')
@section('content')
    <div class="card shadow mb-4 ">
        <div class="card-header py-3 d-flex">
            <h6 class="m-2 font-weight-bold text-primary">Cadastrar Instrutor</h6>
            <a href="{{ route(name: 'Instrutor.index') }}" class="btn btn-secondary ml-auto">Voltar</a>
        </div>
        <div class="card-body table-responsive">
            
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
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <a href="{{ route('Instrutor.create') }}" class="btn btn-secondary">Limpar</a>
                    </div>
                </div>
            </form>

            @if ($users->count())
                <table class="table table-bordered" id="usuariosTable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th style="width: 280px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" role="button"
                                        href="{{ route('Instrutor.store', $user->id) }}">Atribuir</a>
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
