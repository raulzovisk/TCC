@extends('layout')
@section('content')
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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Criação de ficha</h6>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="formFicha" action="{{ route('Ficha.store') }}" method="POST" class="was-validated">
                @csrf

                <div class="row">
                    <div class="form-row col-md-12 d-flex">
                        <div class="form-group col-md-6" id="select">
                            <strong for="id_aluno">Aluno:</strong>
                            <select name="id_aluno" id="id_aluno" class="form-control select2" required>
                                @foreach ($alunos as $aluno)
                                    <option value="{{ $aluno->id }}">{{ $aluno->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <strong for="data">Data:</strong>
                            <input type="date" class="form-control" name="data" id="data" required>
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong for="descricao">Nome da Ficha:</strong>
                            <input type="text" name="descricao" id="descricao" class="form-control rounded mb-3"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <strong for="objetivo">Objetivo:</strong>
                            <input type="text" class="form-control rounded mb-3" name="objetivo" id="objetivo" required>
                        </div>
                    </div>

                    <div id="containerExercicios" class="form-row col-xs-12 col-sm-12 col-md-12"></div>
                </div>

                <div>
                    <button id="btnAdicionarExercicio" class="btn btn-primary">Adicionar Exercício</button>
                    <button class="btn btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let contadorExercicios = 1;

            function validateIntegerInput(value) {
                return /^[0-9]+$/.test(value);
            }

            function adicionarExercicio() {
                let novoCampoExercicio = `
                <div class="exercicio form-row col-xs-12 col-sm-12 col-md-12" id="exercicio_${contadorExercicios}">
                    <div class="form-group col-md-3">
                        <select name="exercicios[${contadorExercicios}][id_exercicio]" id="select_exercicio_${contadorExercicios}" class="form-control select2-exercicio" required>
            `;

                let exerciciosOrdenados = @json($exercicios->sortBy('nome')->values());

                exerciciosOrdenados.forEach(exercicio => {
                    novoCampoExercicio += `<option value="${exercicio.id}">${exercicio.nome}</option>`;
                });

                novoCampoExercicio += `
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" name="exercicios[${contadorExercicios}][repeticoes]" placeholder="Repetições" class="form-control repeticoes" min="1" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" name="exercicios[${contadorExercicios}][series]" placeholder="Séries" class="form-control series" min="1" required>
                    </div>
                    <div class="form-group col-md-3">
                        <button class="btn btn-danger btnRemoverExercicio" data-id="${contadorExercicios}">Remover</button>
                    </div>
                </div>
            `;

                $('#containerExercicios').append(novoCampoExercicio);

                $(`#select_exercicio_${contadorExercicios}`).select2();
                contadorExercicios++;
            }

            $('#btnAdicionarExercicio').on('click', function(event) {
                event.preventDefault();
                adicionarExercicio();
            });

            $(document).on('click', '.btnRemoverExercicio', function(event) {
                event.preventDefault();
                let idExercicio = $(this).data('id');
                $(`#exercicio_${idExercicio}`).remove();
            });

            $('#formFicha').on('submit', function(event) {
                let exerciciosSelecionados = [];
                let duplicado = false;

                $('select[name^="exercicios"]').each(function() {
                    let exercicioId = $(this).val();

                    if (exerciciosSelecionados.includes(exercicioId)) {
                        alert('Você não pode selecionar o mesmo exercício mais de uma vez.');
                        duplicado = true;
                        return false;
                    }

                    exerciciosSelecionados.push(exercicioId);
                });

                if (duplicado) {
                    event.preventDefault();
                }
            });

            $(document).on('input', '.repeticoes, .series', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#id_aluno').select2();
        });
    </script>

@endsection
