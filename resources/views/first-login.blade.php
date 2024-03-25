<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-flags.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-payments.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-vendors.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    body {
        background: rgb(224, 224, 224);
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
        background-color: #f0f0f0;
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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro') }}
        </h2>
    </x-slot>
    <div class="opcoes-container">
        <div class="opcao">
            <a href="{{ route('Aluno.create') }}">Cadastro de Aluno</a>
        </div>
        <div class="opcao">
            <a href="{{ route('Instrutor.index') }}">Instrutor</a>
        </div>
    </div>

</body>
</x-app-layout>