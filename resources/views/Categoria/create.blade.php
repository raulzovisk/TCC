<!-- resources/views/categoria/create.blade.php -->

<form method="POST" action="{{ route('Categoria.store') }}">
    @csrf
    <label for="nome">Nome da Categoria:</label><br>
    <input type="text" id="nome" name="nome"><br>
    <button type="submit">Criar Categoria</button>
</form>
