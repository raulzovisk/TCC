<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    @include('scripts')
</head>
<style></style>
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

                                <div class="form-floating mb-2">
                                    <input type="text" id="altura" name="altura" class="form-control rounded"
                                        placeholder="Altura (cm)" required oninput="validateIntegerInput(this)">
                                    <label for="altura">Altura (cm)</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" id="peso" name="peso" class="form-control rounded"
                                        placeholder="Peso (Kg)" required oninput="validateNumberInput(this)">
                                    <label for="peso">Peso (Kg)</label>
                                </div>

                                <label for="genero">Gênero:</label><br>
                                <div class="form-check-inline mb-2">
                                    <x-checkbox id="generoM" name="genero" value="M"
                                        onchange="onlyOneCheckbox(this)" />
                                    <span>Masculino</span>

                                    <x-checkbox id="generoF" name="genero" value="F"
                                        onchange="onlyOneCheckbox(this)" />
                                    <span>Feminino</span>
                                </div><br>

                                <div class="form-floating mb-2">
                                    <input type="text" id="gordura" name="gordura" class="form-control rounded"
                                        placeholder="Percentual de Gordura %" oninput="validateNumberInput(this)">
                                    <label for="gordura">Percentual de Gordura %</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" id="musculo" name="musculo" class="form-control rounded"
                                        placeholder="Massa Muscular (Kg)" oninput="validateNumberInput(this)">
                                    <label for="musculo">Massa Muscular (Kg)</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="text" id="idade" name="idade" class="form-control rounded"
                                        placeholder="Idade" required oninput="validateIntegerInput(this)">
                                    <label for="idade">Idade</label>
                                </div>

                                <input type="hidden" name="id_user" value="{{ $user->id }}">

                                <div class="text-center">
                                    <button class="btn btn-primary">Cadastrar</button>
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
                // Remove all non-numeric characters except for commas
                value = value.replace(/[^0-9,]/g, '');
                // Allow only one comma
                if ((value.match(/,/g) || []).length > 1) {
                    value = value.replace(/,+$/, ''); // Remove the last comma if more than one
                }
                input.value = value;
            }

            function validateIntegerInput(input) {
                let value = input.value;
                input.value = value.replace(/[^0-9]/g, ''); // Allow only integer numbers
            }

            function onlyOneCheckbox(checkbox) {
                let checkboxes = document.querySelectorAll('input[name="genero"]');
                checkboxes.forEach((item) => {
                    if (item !== checkbox) item.checked = false;
                });
            }
        </script>
    </x-app-layout>
</body>

</html>
