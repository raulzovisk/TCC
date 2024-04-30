@include('scripts')

<x-app-layout>
    <div class="container-fluid mt-3 w-75">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body ">
                        <h1 class="text-center mb-4 display-6">Alterar Dados</h1>
                        <div class="p-3">
                            <form method="POST" action="{{ route('Instrutor.update', $instrutor->id) }}">
                                @csrf
                                @method('put')

                                <div class="mb-2">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="w-100 rounded form-control" id="status" name="status" required>
                                        <option value="Ativo 🟢" {{ $instrutor->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                        <option value="Ausente 🟠" {{ $instrutor->status == 'ausente' ? 'selected' : '' }}>Ausente</option>
                                    </select>
                                </div>
                                
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

</x-app-layout>
