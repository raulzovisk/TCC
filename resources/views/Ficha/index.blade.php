<div class="card">
    <div class="card-header">
        Lista de Suas Fichas Disponíveis
    </div>
    <div class="card-body">
        @if ($fichas && $fichas->isEmpty())
            <p>Você não tem fichas disponíveis.</p>
        @elseif ($fichas)
            <ul>
                @foreach ($fichas as $ficha)
                    <p>Ficha: {{ $ficha->descricao }}</p>
                    <p>Objetivo: {{ $ficha->objetivo }}</p>
                @endforeach
            </ul>
        @else
            <p>Não foi possível carregar suas fichas.</p>
        @endif
    </div>
</div>
