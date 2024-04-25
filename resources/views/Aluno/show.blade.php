<head>
    <title>Meus Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
        body {
            background: rgb(230, 229, 229);
            font-family: 'Montserrat', sans-serif;
        }


        .btn-primary {
            background-color: #0B5ED7 !important;
        }

        .btn-primary:hover {
            background-color: #0c4191 !important;
        }
    </style>
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
