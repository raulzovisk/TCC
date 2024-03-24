<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-flags.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-payments.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-vendors.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    body {
        background: rgb(13, 131, 154);
        background: linear-gradient(107deg, rgba(13, 131, 154, 1) 5%, rgba(95, 162, 218, 1) 52%, rgba(187, 164, 245, 1) 94%);
        font-family: 'Montserrat', sans-serif;
    }


    .opcoes-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        gap: 20px;
    }

    .opcao {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        width: 270px;
        height: 80%;
        text-align: center;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .opcao:hover {
        transform: scale(1.19);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .opcao a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        font-size: 1.2em;

    }
</style>

<body>

    <div class="opcoes-container">
        <div class="opcao">
            <a href="{{ route('Aluno.create') }}">Cadastro de Aluno</a>
        </div>
        <div class="opcao">
            <a href="{{ route('Instrutor.index') }}">Instrutor</a>
        </div>
    </div>

</body>
