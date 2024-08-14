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
                                <label required for="genero">Gênero:</label><br>
                                <div class="form-check-inline mb-2" >
                                    <x-checkbox id="generoM" name="genero" value="M"
                                        onchange="onlyOneCheckbox(this)" />
                                    <span>Masculino</span>

                                    <x-checkbox id="generoF" name="genero" value="F"
                                        onchange="onlyOneCheckbox(this)" />
                                    <span>Feminino</span>
                                </div><br>

                                <input type="text" id="altura" name="altura" class="form-control rounded mb-2"
                                    placeholder="Altura (cm)" required oninput="validateIntegerInput(this)">

                                <input type="text" id="peso" name="peso" class="form-control rounded mb-2"
                                    placeholder="Peso (KG)" required oninput="validateNumberInput(this)">

                                <input type="text" id="gordura" name="gordura" class="form-control rounded mb-2"
                                    placeholder="% Gordura" oninput="validateNumberInput(this)">

                                <input type="text" id="musculo" name="musculo" class="form-control rounded mb-2"
                                    placeholder="Massa Muscular" oninput="validateNumberInput(this)">

                                <input type="text" id="idade" name="idade" class="form-control rounded mb-4"
                                    placeholder="Idade" required oninput="validateIntegerInput(this)">

                                <input type="hidden" name="id_user" value="{{ $user->id }}">

                                <div>
                                    <button class="btn btn-primary">Cadastrar</button>
                                    <a href="{{ route('Aluno.list') }}" class="btn btn-secondary">Cancelar </a>
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
