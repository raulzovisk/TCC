<head>
    <title>Meus Dados</title>
    @include('scripts')
</head>

<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-8 ">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-body">
                        <h1 class="text-center mb-4 display-6">Meus Dados</h1>
                        <div class="p-4">
                            @if ($aluno)
                                <p><strong>Altura:</strong> {{ $aluno->altura }} cm</p>
                                <p><strong>Peso:</strong> {{ $aluno->peso }} kg</p>
                                <p><strong>Gênero:</strong> {{ $aluno->genero }}</p>
                                <p><strong>Percentual de Gordura:</strong> {{ $aluno->gordura }} %</p>
                                <p><strong>Massa Muscular:</strong> {{ $aluno->musculo }} kg</p>
                                <p><strong>Idade:</strong> {{ $aluno->idade }} anos</p>
                            @else
                                <p class="text-center">Você não tem dados ainda. Aguarde o instrutor preenche-los. </p>
                            @endif
                        </div>
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


    <script>
        $(document).ready(function() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    </script>

</x-app-layout>
