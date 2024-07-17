<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    @include('scripts')
</head>

<body>
    <x-app-layout>
        <div class="container-fluid mt-3 w-30">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body ">
                            <h1 class="text-center mb-4 display-6">Cadastrar Aluno</h1>
                            <div class="p-3">
                                <form id="alunoForm" action="{{ route('Aluno.store') }}" method="POST" class="form ">
                                    @csrf
                                    <input type="number" step="0.01" id="altura" name="altura"
                                        class="form-control rounded mb-4" placeholder="Altura  (cm)" id="floatingInput"
                                        required title="Insira sua altura em cm">


                                    <input type="number" step="0.01" id="peso" name="peso"
                                        class="form-control rounded mb-4" placeholder="Peso (Kg)" required
                                        title="Insira seu peso em Kg">

                                    <select id="genero" name="genero" class="form-control mb-4" required
                                        title="Selecione seu gênero">
                                        <option value="">Selecione o Gênero</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>

                                    <input type="number" id="gordura" name="gordura"
                                        class="form-control rounded mb-4" placeholder="Percentual de Gordura %"
                                        title="Insira seu percentual de gordura, se não souber não se preocupe que o instrutor irá inseri-lo">

                                    <input type="number" id="musculo" name="musculo"
                                        class="form-control rounded mb-4" placeholder="Massa Muscular (Kg)"
                                        title="Insira sua massa muscular em Kg, se não souber não se preocupe que o instrutor irá inseri-lose não souber não se preocupe que o instrutor irá inseri-lo">

                                    <input type="number" id="idade" name="idade"
                                        class="form-control rounded mb-4" placeholder="Idade" required
                                        title="Insira sua idade">
                                    <input type="hidden" name="id_user" value="{{ $user->id }}">

                                    <div class="d-flex justify-content-center">
                                       <button class="btn btn-primary">Cadastrar</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>


    </x-app-layout>

</body>

</html>
