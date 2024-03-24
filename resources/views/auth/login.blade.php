<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('estilo.css') }}">
    <title>Seu Título</title>
</head>

<body>
    
    <div class="container" id="container">
        <div class="form-container sign-up" id="register-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Criar Conta</h1>
                <span></span>
                <input type="text" name="name" placeholder="Nome" required autofocus>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Senha" required>
                <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required>
                <button type="submit">Registrar</button>
            </form>
        </div>

        <div class="form-container sign-in" id="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Log In</h1>
                <span></span>
                <input type="email" name="email" placeholder="Email" required autofocus>
                <input type="password" name="password" placeholder="Password" required>
                <div class="block mt-4 flex"> 
                    <label for="remember_me" class="checkbox-label">
                        <x-checkbox id="remember_me" name="remember"/>
                        <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar usuário') }}</span>
                    </label>
                    <div style='margin-right:20px;'></div> 
                    <button type='submit'>Logar</button> 
                </div>
                <x-validation-errors class="mb-4" />
            </form>
        </div>
        
        


        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem vindo de volta!</h1>
                    <p>Se já tiver cadastro, apenas insira os dados para usar o site</p>
                    <button class="hidden" id="login">Logar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Olá, usuário!</h1>
                    <p>Registe-se no site para poder acessá-lo</p>
                    <button class="hidden" id="register">Registre-se</button>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
</body>

</html>
