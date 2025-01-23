<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar dados Instrutor</title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Editar Instrutor</h1>
                        </div>
                        <div class="p-3">
                            <form method="POST" action="{{ route('Instrutor.update', $instrutor->id) }}">
                                @csrf
                                @method('put')

                                <div class="mb-3 ">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="w-100 rounded form" id="status" name="status" required>
                                        <option value="🟢" {{ $instrutor->status == 'ativo' ? 'selected' : '' }}>
                                            Ativo</option>
                                        <option value="🟠" {{ $instrutor->status == 'ausente' ? 'selected' : '' }}>
                                            Ausente</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary">Salvar </button>
                                <a href="{{ route('Instrutor.index') }}" class="btn btn-secondary">Cancelar </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    </form>
</body>

</html>
