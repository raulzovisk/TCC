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

    .btn-secondary {
        background-color: #5C636A !important
    }

    .btn-secondary:hover {
        background-color: #4a5157 !important
    }

    .btn-danger {
        background-color: #BB2D3B !important
    }

    .btn-danger:hover {
        background-color: #9b2430 !important
    }
</style>



<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header">
                        <h1 class="text-center mb-1 display-6">Instrutores</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Instrutor.index') }}" method="GET">
                            <input type="text" name="search" class="rounded-pill mb-1" placeholder="Buscar por nomes..">
                            <input type="submit" value="Buscar">
                        </form>

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
                                                    style="display: flex; align-items: center; color: #eca603; font-weight: 500">
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
                                                <form method="GET">
                                                    @csrf
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $instrutor->id }}"
                                                        style="display: flex; align-items: center; background: none; border: none; color: #BB2D3B; font-weight: 500">
                                                        <span>Desvincular</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#BB2D3B" stroke-width="2" stroke-linecap="round"
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
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="confirmModal{{ $instrutor->id }}" tabindex="-1" aria-labelledby="confirmModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmModalLabel">Desvincular Instrutor</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Tem certeza de que deseja desvincular este instrutor?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <form id="deleteForm" action="{{ route('Instrutor.delete', $instrutor->id) }}" method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Desvincular</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                

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
    @if (session('success'))
        <div class="alert alert-success w-25 position-fixed bottom-0 end-0 m-3" role="alert" id="success-alert">
            {{ session('success') }}
        </div>
    @endif



    <!--Modal script -->
    <script>
        $(document).ready(function() {
            $('#deleteForm').on('submit', function(event) {
                event.preventDefault();
                $('#confirmModal').modal('hide');
                $(this).unbind('submit').submit();
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    </script>



</x-app-layout>
