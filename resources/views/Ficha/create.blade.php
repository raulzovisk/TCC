<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Criar Ficha</title>
    @include('scripts')
    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
            color: #444;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 34px;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header" style="background-color: white">
                            <h1 class="text-center mb-1 display-6">Ficha de Exercícios</h1>
                        </div>
                        <div class="card-body">
                            <form id="formFicha" action="{{ route('Ficha.store') }}" method="POST">
                                @csrf
                                <div class="form d-flex flex-wrap justify-content-between mt-3">

                                    <div class="mr-6">
                                        <label for="id_aluno">Aluno:</label>
                                        <select name="id_aluno" id="id_aluno" class="form-control select2 rounded mb-3" required>
                                            @foreach ($alunos as $aluno)
                                                <option value="{{ $aluno->id }}">{{ $aluno->user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="data">Data:</label>
                                        <input type="date" class="form-control rounded mb-3" name="data" id="data" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Nome da Ficha:</label>
                                    <input type="text" name="descricao" id="descricao" class="form-control rounded mb-3" required>
                                </div>
                                <div class="form-group">
                                    <label for="objetivo">Objetivo:</label>
                                    <input type="text" class="form-control rounded mb-3" name="objetivo" id="objetivo" required>
                                </div>

                                <div id="containerExercicios" class="form-group"></div>
                                <button id="btnAdicionarExercicio" class="btn btn-primary">Adicionar Exercício</button>
                                <button class="btn btn-success">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

<script>
    $(document).ready(function() {
        let contadorExercicios = 1;

        function adicionarExercicio() {
            let novoCampoExercicio = `
                <div class="exercicio form-control rounded mb-3 border border-primary" id="exercicio_${contadorExercicios}" style="display: none;">
                    <label for="exercicio_${contadorExercicios}">Exercício:</label>
                    <select name="exercicios[${contadorExercicios}][id_exercicio]" id="select_exercicio_${contadorExercicios}" class="form-control select2-exercicio rounded mb-3" required>
            `;

            let exerciciosOrdenados = @json($exercicios->sortBy('nome')->values());

            exerciciosOrdenados.forEach(exercicio => {
                novoCampoExercicio += `<option value="${exercicio.id}">${exercicio.nome}</option>`;
            });

            novoCampoExercicio += `
                    </select>
                    <label for="exercicio_${contadorExercicios}_repeticoes">Repetições:</label>
                    <input type="number" name="exercicios[${contadorExercicios}][repeticoes]" id="exercicio_${contadorExercicios}_repeticoes" class="form-control rounded mb-3" required>
                    <label for="exercicio_${contadorExercicios}_series">Séries:</label>
                    <input type="number" name="exercicios[${contadorExercicios}][series]" id="exercicio_${contadorExercicios}_series" class="form-control rounded mb-3" required>
                    <button class="btn btn-danger btnRemoverExercicio" data-id="${contadorExercicios}">Remover</button>
                </div>
            `;

            let $novoCampo = $(novoCampoExercicio);
            $('#containerExercicios').append($novoCampo);
            $novoCampo.slideDown();

            $(`#select_exercicio_${contadorExercicios}`).select2();

            contadorExercicios++;
        }

        $('#btnAdicionarExercicio').on('click', function(event) {
            event.preventDefault();
            adicionarExercicio();
        });

        $(document).on('click', '.btnRemoverExercicio', function(event) {
            let idExercicio = $(this).data('id');
            event.preventDefault();
            $(`#exercicio_${idExercicio}`).slideUp(function() {
                $(this).remove();
            });
        });

        $('#id_aluno').select2();
    });
</script>

</html>
