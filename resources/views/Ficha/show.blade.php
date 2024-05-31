

    <div class="card">
        <div class="card-header">
            Detalhes da Ficha
        </div>
        <div class="card-body">
            <p><strong>ID da Ficha:</strong> {{ $ficha->id }}</p>
            <p><strong>Objetivo:</strong> {{ $ficha->objetivo }}</p>
            <p><strong>Descrição:</strong> {{ $ficha->descricao }}</p>
            <p><strong>Data:</strong> {{ $ficha->data }}</p>
            <p><strong>Instrutor:</strong> {{ $ficha->instrutor->nome }}</p>
            <p><strong>Aluno:</strong> {{ $ficha->aluno->nome }}</p>

            <hr>

            <h4>Exercícios:</h4>
            <ul>
                @foreach($ficha->exercicios as $exercicio)
                    <li>{{ $exercicio->nome }} - Repetições: {{ $exercicio->pivot->repeticoes }}, Séries: {{ $exercicio->pivot->series }}</li>
                @endforeach
            </ul>
        </div>
    </div>
