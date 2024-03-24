<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('estilo.css') }}">

    <title></title>
</head>

<body>

    <div class="container" id="container">
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem vindo de volta</h1>
                    <p>Se já tiver cadastro, apenas insira os dados para usar o site</p>
                    <button class="hidden" id="login">Logar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Olá, usuário!</h1>
                    <p>Registe-se no site para poder acessá-lo</p>
                    <button class="hidden" id="register" onclick="window.location='{{ route('register') }}'">Registre-se</button>
                </div>
            </div>
        </div>
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Criar Conta</h1>
                <div class="social-icons">
                </div>
                <span></span>
                <input type="text" name="name" placeholder="Nome" required autofocus>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Senha" required>
                <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required>
                <button type="submit">Registrar</button>
            </form>
        </div>
      
        

    </div>

</body>

</html>
