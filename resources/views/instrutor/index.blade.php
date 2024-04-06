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
                <div class="card shadow p-3 mb-5 bg-white rounded">
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
                                        <th>Editar Status</th>
                                        <th>Desvincular Instrutor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instrutores as $instrutor)
                                        <tr>
                                            <td>{{ $instrutor->id }}</td>
                                            <td>{{ $instrutor->user->name }}</td>
                                            <td>{{ $instrutor->status }}</td>
                                            <td>
                                                <a href="{{ route('Instrutor.edit', $instrutor->id) }}"
                                                    style="display: flex; align-items: center;">
                                                    <span>Editar</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit"
                                                        style="margin-left: 10px;">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('Instrutor.delete', $instrutor->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    <button type="submit"
                                                        style="display: flex; align-items: center; background: none; border: none;">
                                                        <span>Desvincular</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-unlink"
                                                            style="margin-left: 10px;">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M17 22v-2" />
                                                            <path d="M9 15l6 -6" />
                                                            <path
                                                                d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                                                            <path
                                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                                                            <path d="M20 17h2" />
                                                            <path d="M2 7h2" />
                                                            <path d="M7 2v2" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>





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
