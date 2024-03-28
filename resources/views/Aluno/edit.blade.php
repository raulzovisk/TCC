<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<style>
    body {
        background: rgb(230, 229, 229);
        font-family: 'Montserrat', sans-serif;
    }

    .btn-success {
        background-color: #157347 !important
    }

    .btn-success:hover {
        background-color: #105535 !important
    }
    }
</style>

<x-app-layout>
    <div class="container-fluid mt-4 w-75">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body ">
                        <h1 class="text-center mb-4 display-6">Alterar Dados</h1>
                        <div class="p-3">
                            <form method="POST" action="{{ route('Aluno.update', $aluno->id) }}">
                                @csrf
                                @method('put')

                                <div class="mb-2 ">
                                    <label for="altura" class="form-label">Altura</label>
                                    <input type="number" class="form-control" id="altura" name="altura"
                                        value="{{ $aluno->altura }}" required>
                                </div>

                                <div class="mb-2">
                                    <label for="peso" class="form-label">Peso</label>
                                    <input type="number" class="form-control" id="peso" name="peso"
                                        value="{{ $aluno->peso }}" required>
                                </div>
                                <!--
                                <div class="mb-2">
                                    <select id="genero" name="genero" class="form-control mb-4" required
                                        title="Selecione seu gênero">
                                        <option value=" {{ $aluno->sexo }}">Selecione o Gênero</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>s
                                    </select>
                                </div>
                            -->
                                <div class="mb-2">
                                    <label for="gordura" class="form-label">Gordura</label>
                                    <input type="number" class="form-control" id="gordura" name="gordura"
                                        value="{{ $aluno->gordura }}">
                                </div>

                                <div class="mb-2">
                                    <label for="musculo" class="form-label">Massa Muscular</label>
                                    <input type="number" class="form-control" id="musculo" name="musculo"
                                        value="{{ $aluno->musculo }}">
                                </div>

                                <div class="mb-2">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="number" class="form-control" id="idade" name="idade"
                                        value="{{ $aluno->idade }}" required>
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
