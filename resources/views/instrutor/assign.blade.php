@include('scripts')

<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white">
                    <div class="card-header">
                        <h1 class="text-center mb-1 display-6">Atribuir Instrutor</h1>
                    </div>
                    <div class="card-body">
                        <input type="text" id="search" class="rounded-pill mb-1" onkeyup="search()"
                            placeholder="Buscar por nomes..">

                        @if ($users->count())
                            <table class="table" id="usuariosTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Atribuição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td><a style="color: rgb(16, 125, 161); font-weight: 500"
                                                    href="{{ route('Instrutor.assignUser', $user->id) }}">Atribuir como
                                                    Instrutor</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>{{ __('Nenhum usuário encontrado.') }}</p>
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
            table = document.getElementById("usuariosTable");
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
