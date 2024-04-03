<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<style>
    body {
        background: rgb(230, 229, 229);
        font-family: 'Montserrat', sans-serif;
    }
</style>



<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white">
                    <div class="card-header">
                        <h1 class="text-center mb-1 display-6">Instrutores</h1>
                    </div>
                    <div class="card-body">
                        <input type="text" id="search" class="rounded-pill mb-1" onkeyup="search()"
                            placeholder="Buscar por nomes..">

                        @if ($instrutores->count())
                            <table class="table" id="instrutorTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Status</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instrutores as $instrutor)
                                        <tr>
                                            <td>{{ $instrutor->id }}</td>
                                            <td>{{ $instrutor->user->name }}</td>
                                            <td>{{ $instrutor->status}}</td>
                                            <td><a href="{{ route('Instrutor.edit', $instrutor->id) }}">Editar</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>    
                            </table>

                            {{ $instrutores->links() }}
                        @else
                            <p>{{ __('Nenhum instrutor encontrado.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("instrutorTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</x-app-layout>
