<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                        <h1 class="text-center mb-1 display-6">Alunos</h1>
                    </div>
                    <div class="card-body">
                        <input type="text" id="search" class="rounded-pill mb-1" onkeyup="search()"
                            placeholder="Buscar por nomes..">

                        @if ($alunos->count())
                            <table class="table" id="alunoTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alunos as $aluno)
                                        <tr>
                                            <td>{{ $aluno->id }}</td>
                                            <td>{{ $aluno->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $alunos->links() }}
                        @else
                            <p>{{ __('Nenhum aluno encontrado.') }}</p>
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
            table = document.getElementById("alunoTable");
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
