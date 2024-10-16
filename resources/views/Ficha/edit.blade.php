@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Criação de ficha</h6>
        </div>


        <div class="card-body">
            <form action="{{ route('Ficha.update', $ficha->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control rounded" id="nome" name="nome"
                        value="{{ $ficha->nome }}" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição </label>
                    <input type="text" class="form-control rounded" id="descricao" name="descricao"
                        value="{{ $ficha->descricao }}" required>
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
                            <input type="text" class="form-control rounded mb-2"
                                name="detalhes[{{ $exercicio->id }}][observacoes]" placeholder="Repetições"
                                value="{{ $exercicio->pivot->observacoes ?? '' }}" required>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-primary">Salvar</button>
                <button onclick="history.back()" class="btn btn-secondary ">Cancelar</button>
            </form>
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
                    var series = @json($ficha->exercicios).find(e => e.id == exercicioId)?.pivot?.series || '';
                    var repeticoes = @json($ficha->exercicios).find(e => e.id == exercicioId)?.pivot?.repeticoes || '';
                    var observacoes = @json($ficha->exercicios).find(e => e.id == exercicioId)?.pivot?.observacoes || ''; // Adicionando observações
    
                    var detalheHtml = `
                        <div class="exercicio-detalhe" data-exercicio-id="${exercicio.id}">
                            <h5>${exercicio.nome}</h5>
                            <input type="text" class="form-control rounded mb-1" name="detalhes[${exercicio.id}][series]" placeholder="Séries" value="${series}" required oninput="validateIntegerInput(this)">
                            <input type="text" class="form-control rounded mb-1" name="detalhes[${exercicio.id}][repeticoes]" placeholder="Repetições" value="${repeticoes}" required oninput="validateIntegerInput(this)">
                            <input type="text" class="form-control rounded mb-1" name="detalhes[${exercicio.id}][observacoes]" placeholder="Observações" value="${observacoes}">
                        </div>
                    `;
    
                    $('#exercicios-detalhes').append(detalheHtml);
                });
            });
    
            $('#exercicios').trigger('change');
        });
    </script>
    
@endsection
