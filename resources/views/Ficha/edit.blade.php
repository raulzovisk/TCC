@include('scripts')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

<div class="d-flex justify-content-center mt-5">

    <div class="card shadow mb-4 w-50 ">
        <div class="card-header py-3">
            <h6 class="m-0 text-primary" style="font-weight: bold">Edição de Ficha</h6>
        </div>


        <div class="card-body">
            <form action="{{ route('Ficha.update', $ficha->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="descricao" class="form-label">Nome</label>
                    <input type="text" class="form-control rounded" id="descricao" name="descricao"
                        value="{{ $ficha->descricao }}" required>
                </div>
                <div class="mb-3">
                    <label for="objetivo" class="form-label">Objetivo</label>
                    <input type="text" class="form-control rounded" id="objetivo" name="objetivo"
                        value="{{ $ficha->objetivo }}" required>
                </div>
                <div class="mb-3">
                    <label for="exercicios" class="form-label">Exercícios</label>
                    <select id="exercicios" name="exercicios[]" class="form-control" multiple="multiple">
                        @foreach ($exercicios as $exercicio)
                            <option value="{{ $exercicio->id }}"
                                {{ $ficha->exercicios->contains($exercicio->id) ? 'selected' : '' }}>
                                {{ $exercicio->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="exercicios-detalhes">
                    @foreach ($ficha->exercicios as $exercicio)
                        <div class="exercicio-detalhe" data-exercicio-id="{{ $exercicio->id }}">
                            <h5>{{ $exercicio->nome }}</h5>
                            <input type="text" class="form-control rounded mb-2"
                                name="detalhes[{{ $exercicio->id }}][series]" placeholder="Séries"
                                value="{{ $exercicio->pivot->series ?? '' }}" required>
                            <input type="text" class="form-control rounded mb-2"
                                name="detalhes[{{ $exercicio->id }}][repeticoes]" placeholder="Repetições"
                                value="{{ $exercicio->pivot->repeticoes ?? '' }}" required>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-primary">Salvar</button>
                <a href="{{route('Aluno.index')}}" class="btn btn-secondary ">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    function validateIntegerInput(input) {
        let value = input.value;
        input.value = value.replace(/[^0-9]/g, '');
    }

    $(document).ready(function() {
        $('#exercicios').select2();

        $('#exercicios').on('change', function() {
            var exercicios = $(this).val();
            $('#exercicios-detalhes').empty();

            exercicios.forEach(function(exercicioId) {
                var exercicio = @json($exercicios).find(e => e.id == exercicioId);
                var series = @json($ficha->exercicios).find(e => e.id == exercicioId)?.pivot
                    ?.series || '';
                var repeticoes = @json($ficha->exercicios).find(e => e.id == exercicioId)
                    ?.pivot?.repeticoes || '';

                var detalheHtml = `
                        <div class="exercicio-detalhe" data-exercicio-id="${exercicio.id}">
                            <h5>${exercicio.nome}</h5>
                            <input type="text" class="form-control rounded mb-1" name="detalhes[${exercicio.id}][series]" placeholder="Séries" value="${series}" required oninput="validateIntegerInput(this)">
                            <input type="text" class="form-control rounded mb-1" name="detalhes[${exercicio.id}][repeticoes]" placeholder="Repetições" value="${repeticoes}" required oninput="validateIntegerInput(this)">
                        </div>
                    `;

                $('#exercicios-detalhes').append(detalheHtml);
            });
        });

        $('#exercicios').trigger('change');
    });
</script>
