<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(161, 189, 250);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #alunoForm {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 500px; 
            height: auto; 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #submitButton {
            width: 100%;
        }
    </style>
</head>

<body>
    <form id="alunoForm" action="{{ route('Aluno.store') }}" method="POST">
        @csrf
        <h2 class="text-center mb-4">Cadastro de Aluno</h2>

        <input type="number" step="0.01" id="altura" name="altura" class="form-control mb-3"
            placeholder="Altura (cm)" required>

        <input type="number" step="0.01" id="peso" name="peso" class="form-control mb-3" placeholder="Peso (Kg)"
            required>

        <select id="genero" name="genero" class="form-control mb-3" required>
            <option value="">Selecione o Gênero</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>

        <input type="number" id="gordura" name="gordura" class="form-control mb-3"
            placeholder="Percentual de Gordura %" required>

        <input type="number" id="musculo" name="musculo" class="form-control mb-3" placeholder="Massa Muscular (Kg)"
            required>

        <input type="number" id="idade" name="idade" class="form-control mb-3" placeholder="Idade" required>
        <!-- Adicione um campo hidden para o id_user, que será preenchido automaticamente -->

        <input type="hidden" name="id_user" value="{{ Auth::id() }}">

        <button type="submit" id="submitButton" class="btn btn-primary">Enviar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
