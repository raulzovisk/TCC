<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados: {{ $aluno->user->name }}</title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Alterar Dados : {{ $aluno->user->name }}</h1>
                        </div>
                            <div class="p-3">
                                <form method="POST" action="{{ route('Aluno.update', $aluno->id) }}" id="alunoForm">
                                    @csrf
                                    @method('put')

                                    <div class="mb-2">
                                        <label for="altura" class="form-label">Altura</label>
                                        <input type="text" class="form-control rounded" id="altura" name="altura"
                                            value="{{ $aluno->altura }}" required oninput="validateIntegerInput(this)">
                                    </div>

                                    <div class="mb-2">
                                        <label for="peso" class="form-label">Peso</label>
                                        <input type="text" class="form-control rounded" id="peso" name="peso"
                                            value="{{ $aluno->peso }}" required oninput="validateNumberInput(this)">
                                    </div>

                                    <div class="mb-2">
                                        <label for="gordura" class="form-label">Gordura</label>
                                        <input type="text" class="form-control rounded" id="gordura" name="gordura"
                                            value="{{ $aluno->gordura }}" oninput="validateNumberInput(this)">
                                    </div>

                                    <div class="mb-2">
                                        <label for="musculo" class="form-label">Massa Muscular</label>
                                        <input type="text" class="form-control rounded" id="musculo" name="musculo"
                                            value="{{ $aluno->musculo }}" oninput="validateNumberInput(this)">
                                    </div>

                                    <div class="mb-4">
                                        <label for="idade" class="form-label">Idade</label>
                                        <input type="text" class="form-control rounded" id="idade" name="idade"
                                            value="{{ $aluno->idade }}" required oninput="validateIntegerInput(this)">
                                    </div>

                                    <div>
                                        <button class="btn btn-primary">Salvar </button>
                                        <a href="{{ route('Aluno.index') }}"  class="btn btn-secondary">Cancelar </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        function validateNumberInput(input) {
            let value = input.value;
            // Remova todos os caracteres não numéricos, exceto vírgulas
            value = value.replace(/[^0-9,]/g, '');
            // Allow only one comma
            if ((value.match(/,/g) || []).length > 1) {
                value = value.replace(/,+$/, ''); // Remova a última vírgula se houver mais de um
            }
            input.value = value;
        }

        function validateIntegerInput(input) {
            let value = input.value;
            input.value = value.replace(/[^0-9]/g, ''); 
        }

        document.getElementById('alunoForm').addEventListener('submit', function(event) {
            const numberFields = ['peso', 'gordura', 'musculo'];
            numberFields.forEach(function(fieldId) {
                let field = document.getElementById(fieldId);
                if (field && field.value.includes(',')) {
                    field.value = field.value.replace(',', '.');
                }
            });
        });
    </script>
</body>

</html>
