<!-- resources/views/categoria/index.blade.php -->

<h1>Categorias</h1>


<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('Categoria.create') }}">Criar nova categoria</a>
