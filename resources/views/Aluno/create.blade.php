<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            background: rgb(230, 229, 229);
            font-family: 'Montserrat', sans-serif;
        }

        #alunoForm {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 500px;
        }

        .div {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .btn-success {
            background-color: #157347 !important
        }

        .btn-success:hover {
            background-color: #105535 !important
        }
    </style>
</head>

<body>
    <x-app-layout>
        <div class="div w-100 h-75 mt-5">
            <div class="at">
                <form id="alunoForm" action="{{ route('Aluno.store') }}" method="POST" class="form">
                    @csrf
                    <h1 class="text-center mb-4 display-6">Cadastro de Aluno</h1>
                    <input type="number" step="0.01" id="altura" name="altura" class="form-control rounded mb-4"
                        placeholder="Altura  (cm)" id="floatingInput" required title="Insira sua altura em cm">


                    <input type="number" step="0.01" id="peso" name="peso" class="form-control rounded mb-4"
                        placeholder="Peso (Kg)" required title="Insira seu peso em Kg">

                    <select id="genero" name="genero" class="form-control mb-4" required
                        title="Selecione seu gênero">
                        <option value="">Selecione o Gênero</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>

                    <input type="number" id="gordura" name="gordura" class="form-control rounded mb-4"
                        placeholder="Percentual de Gordura %"
                        title="Insira seu percentual de gordura, se não souber não se preocupe que o instrutor irá inseri-lo">

                    <input type="number" id="musculo" name="musculo" class="form-control rounded mb-4"
                        placeholder="Massa Muscular (Kg)"
                        title="Insira sua massa muscular em Kg, se não souber não se preocupe que o instrutor irá inseri-lose não souber não se preocupe que o instrutor irá inseri-lo">

                    <input type="number" id="idade" name="idade" class="form-control rounded mb-4"
                        placeholder="Idade" required title="Insira sua idade">
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">

                    <div class="d-flex justify-content-center">
                        <button type="submit" id="submitButton" class="btn btn-success w-50">Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </x-app-layout>

</body>

</html>
