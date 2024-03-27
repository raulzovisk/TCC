<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<style>
    body {
        background: rgb(230, 229, 229);
        font-family: 'Montserrat', sans-serif;
    }

    .opcoes-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 500px;
        gap: 60px;
    }

    .opcao {
        background-color: #ffffff;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        width: 270px;
        height: 70%;
        text-align: center;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .opcao:hover {
        transform: scale(1.06);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .opcao a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        font-size: 1.2em;

    }
</style>
<x-app-layout>

    <body>
        <div class="opcoes-container mt-5" >
            <div class="opcao">
                <a href="{{ route('Aluno.create') }}">Cadastro de Aluno</a>
            </div>
            <div class="opcao">
                <a href="{{ route('Instrutor.index') }}">Instrutor</a>
            </div>
        </div>

    </body>
</x-app-layout>
