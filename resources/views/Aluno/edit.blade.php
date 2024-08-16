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
                            <h1 class="text-center mb-1 display-6">Alterar Dados: {{ $aluno->user->name }}</h1>
                        </div>
                        <div class="p-3">
                            <form method="POST" action="{{ route('Aluno.update', $aluno->id) }}" id="alunoForm">
                                @csrf
                                @method('PUT')

                                @php
                                    // Recupera a última medida corporal do aluno
                                    $ultimaMedida = $aluno->medidasCorporais->last();
                                @endphp

                                <div class="mb-2">
                                    <label for="altura" class="form-label">Altura (cm)</label>
                                    <input type="text" class="form-control rounded" id="altura" name="altura"
                                        value="{{ $ultimaMedida->altura ?? '' }}" required oninput="validateNumberInput(this)">
                                </div>

                                <div class="mb-2">
                                    <label for="peso" class="form-label">Peso (KG)</label>
                                    <input type="text" class="form-control rounded" id="peso" name="peso"
                                        value="{{ $ultimaMedida->peso ?? '' }}" required oninput="validateNumberInput(this)">
                                </div>

                                <div class="mb-2">
                                    <label for="gordura" class="form-label">% Gordura</label>
                                    <input type="text" class="form-control rounded" id="gordura" name="gordura"
                                        value="{{ $ultimaMedida->gordura ?? '' }}" oninput="validateNumberInput(this)">
                                </div>

                                <div class="mb-2">
                                    <label for="cintura" class="form-label">Cintura (cm)</label>
                                    <input type="text" class="form-control rounded" id="cintura" name="cintura"
                                        value="{{ $ultimaMedida->cintura ?? '' }}" required oninput="validateNumberInput(this)">
                                </div>

                                <div class="mb-2">
                                    <label for="quadril" class="form-label">Quadril (cm)</label>
                                    <input type="text" class="form-control rounded" id="quadril" name="quadril"
                                        value="{{ $ultimaMedida->quadril ?? '' }}" required oninput="validateNumberInput(this)">
                                </div>

                                <div class="mb-2">
                                    <label for="peito" class="form-label">Peito (cm)</label>
                                    <input type="text" class="form-control rounded" id="peito" name="peito"
                                        value="{{ $ultimaMedida->peito ?? '' }}" required oninput="validateNumberInput(this)">
                                </div>

                                <div class="d-flex">
                                    <div class="flex-grow-1 mr-2">
                                        <label for="braco_direito" class="form-label">Braço Direito (cm)</label>
                                        <input type="text" class="form-control rounded" id="braco_direito" name="braco_direito"
                                            value="{{ $ultimaMedida->braco_direito ?? '' }}" required oninput="validateNumberInput(this)">
                                    </div>
                                    <div class="flex-grow-1">
                                        <label for="braco_esquerdo" class="form-label">Braço Esquerdo (cm)</label>
                                        <input type="text" class="form-control rounded" id="braco_esquerdo" name="braco_esquerdo"
                                            value="{{ $ultimaMedida->braco_esquerdo ?? '' }}" required oninput="validateNumberInput(this)">
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="flex-grow-1 mr-2">
                                        <label for="coxa_direita" class="form-label">Coxa Direita (cm)</label>
                                        <input type="text" class="form-control rounded" id="coxa_direita" name="coxa_direita"
                                            value="{{ $ultimaMedida->coxa_direita ?? '' }}" required oninput="validateNumberInput(this)">
                                    </div>
                                    <div class="flex-grow-1 mb-2">
                                        <label for="coxa_esquerda" class="form-label">Coxa Esquerda (cm)</label>
                                        <input type="text" class="form-control rounded" id="coxa_esquerda" name="coxa_esquerda"
                                            value="{{ $ultimaMedida->coxa_esquerda ?? '' }}" required oninput="validateNumberInput(this)">
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary">Salvar</button>
                                    <a href="{{ route('Aluno.index') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        function validateNumberInput(input) {
            let value = input.value;
            value = value.replace(/[^0-9,]/g, '');
            if ((value.match(/,/g) || []).length > 1) {
                value = value.replace(/,+$/, '');
            }
            input.value = value;
        }

        document.getElementById('alunoForm').addEventListener('submit', function(event) {
            const numberFields = ['peso', 'gordura', 'cintura', 'quadril', 'peito', 'braco_direito', 'braco_esquerdo', 'coxa_direita', 'coxa_esquerda'];
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
