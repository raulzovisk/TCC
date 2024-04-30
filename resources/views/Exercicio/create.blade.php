<!-- resources/views/exercicio/create.blade.php -->

<form method="POST" action="{{ route('Exercicio.store') }}">
    @csrf
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"><br>
    <label for="series">Séries:</label><br>
    <input type="number" id="series" name="series"><br>
    <label for="repeticoes">Repetições:</label><br>
    <input type="number" id="repeticoes" name="repeticoes"><br>
    <label for="id_categoria">Categoria:</label><br>
    <select id="id_categoria" name="id_categoria">
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach
    </select><br>
    <button type="submit">Adicionar Exercício</button>
</form>
