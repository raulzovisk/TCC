<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center display-6">Cadastrar Aluno</h1>
                        </div>
                        <div class="card-body">
                            <form id="alunoForm" action="{{ route('Aluno.store') }}" method="POST" class="form">
                                @csrf

                                <input type="hidden" name="id_user" value="{{ $user->id }}">

                                <div>
                                    <input type="text" id="idade" name="idade"
                                        class="form-control rounded mb-2" placeholder="Idade" required
                                        oninput="validateIntegerInput(this)">
                                </div>

                                <div>
                                    <input type="text" id="peso" name="peso"
                                        class="form-control rounded mb-2" placeholder="Peso (KG)" required
                                        oninput="validateNumberInput(this)">
                                </div>

                                <div>
                                    <input type="text" id="altura" name="altura"
                                        class="form-control rounded mb-2" placeholder="Altura (cm)" required
                                        oninput="validateIntegerInput(this)">
                                </div>

                                <div class="d-flex">
                                    <div class="flex-grow-1 mr-2">
                                        <input type="text" id="gordura" name="gordura"
                                            class="form-control rounded mb-2" placeholder="% Gordura" required
                                            oninput="validateNumberInput(this)">
                                    </div>

                                    <div class="flex-grow-1">
                                        <select id="genero" name="genero" class="form-control rounded mb-2" required>
                                            <option value="" disabled selected>Selecione o gênero</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <hr class="mb-2">
                                <div>
                                    <input type="text" id="cintura" name="cintura"
                                        class="form-control rounded mb-2" placeholder="Cintura (cm)" required
                                        oninput="validateIntegerInput(this)">
                                </div>

                                <div>
                                    <input type="text" id="quadril" name="quadril"
                                        class="form-control rounded mb-2" placeholder="Quadril (cm)" required
                                        oninput="validateIntegerInput(this)">
                                </div>

                                <div>
                                    <input type="text" id="peito" name="peito"
                                        class="form-control rounded mb-2" placeholder="Peito (cm)" required
                                        oninput="validateIntegerInput(this)">
                                </div>

                                <div class="d-flex">
                                    <div class="flex-grow-1 mr-2">
                                        <input type="text" id="braco_direito" name="braco_direito"
                                            class="form-control rounded mb-2" placeholder="Braço Direito (cm)" required
                                            oninput="validateIntegerInput(this)">
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" id="braco_esquerdo" name="braco_esquerdo"
                                            class="form-control rounded mb-2" placeholder="Braço Esquerdo (cm)" required
                                            oninput="validateIntegerInput(this)">
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="flex-grow-1 mr-2">
                                        <input type="text" id="coxa_direita" name="coxa_direita"
                                            class="form-control rounded mb-2" placeholder="Coxa Direita (cm)" required
                                            oninput="validateIntegerInput(this)">
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" id="coxa_esquerda" name="coxa_esquerda"
                                            class="form-control rounded mb-2" placeholder="Coxa Esquerda (cm)" required
                                            oninput="validateIntegerInput(this)">
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary">Cadastrar</button>
                                    <a href="{{ route('Aluno.list') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function validateNumberInput(input) {
                let value = input.value;
                value = value.replace(/[^0-9,]/g, '');

                if ((value.match(/,/g) || []).length > 1) {
                    value = value.replace(/,+$/, '');
                }
                input.value = value;
            }

            function validateIntegerInput(input) {
                let value = input.value;
                input.value = value.replace(/[^0-9]/g, '');
            }
        </script>
    </x-app-layout>
</body>
</html>
