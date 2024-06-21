<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Ficha</title>
    @include('scripts')
</head>
<body>
    <x-app-layout>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header">
                            <h1 class="text-center mb-1 display-6">Editar Ficha</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Ficha.update', $ficha->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <input type="text" class="form-control rounded" id="descricao" name="descricao" value="{{ $ficha->descricao }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="objetivo" class="form-label">Objetivo</label>
                                    <input type="text" class="form-control rounded" id="objetivo" name="objetivo" value="{{ $ficha->objetivo }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exercicios" class="form-label">Exercícios</label>
                                    <select id="exercicios" name="exercicios[]" class="form-control" multiple="multiple">
                                        @foreach ($exercicios as $exercicio)
                                            <option value="{{ $exercicio->id }}" {{ $ficha->exercicios->contains($exercicio->id) ? 'selected' : '' }}>{{ $exercicio->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="exercicios-detalhes">
                                    @foreach ($ficha->exercicios as $exercicio)
                                        <div class="exercicio-detalhe" data-exercicio-id="{{ $exercicio->id }}">
                                            <h5>{{ $exercicio->nome }}</h5>
                                            <input type="number" class="form-control rounded mb-2" name="detalhes[{{ $exercicio->id }}][series]" placeholder="Séries" value="{{ $exercicio->pivot->series ?? '' }}" required>
                                            <input type="number" class="form-control rounded mb-2" name="detalhes[{{ $exercicio->id }}][repeticoes]" placeholder="Repetições" value="{{ $exercicio->pivot->repeticoes ?? '' }}" required>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    <script>
        $(document).ready(function() {
            $('#exercicios').select2();

            $('#exercicios').on('change', function() {
                var exercicios = $(this).val();
                $('#exercicios-detalhes').empty();

                exercicios.forEach(function(exercicioId) {
                    var exercicio = @json($exercicios).find(e => e.id == exercicioId);
                    var series = @json($ficha->exercicios).find(e => e.id == exercicioId)?.pivot?.series || '';
                    var repeticoes = @json($ficha->exercicios).find(e => e.id == exercicioId)?.pivot?.repeticoes || '';

                    var detalheHtml = `
                        <div class="exercicio-detalhe" data-exercicio-id="${exercicio.id}">
                            <h5>${exercicio.nome}</h5>
                            <input type="number" class="form-control rounded mb-1" name="detalhes[${exercicio.id}][series]" placeholder="Séries" value="${series}" required>
                            <input type="number" class="form-control rounded mb-1" name="detalhes[${exercicio.id}][repeticoes]" placeholder="Repetições" value="${repeticoes}" required>
                        </div>
                    `;

                    $('#exercicios-detalhes').append(detalheHtml);
                });
            });

            $('#exercicios').trigger('change');
        });
    </script>
</body>
</html>
