<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('estilo.css') }}">
    <title>Login/Registro</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up" id="register-form">
            <form  id="signupForm" method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Criar Conta</h1>
                <span></span>
                <input id="name" type="text" placeholder="Nome" name="name" :value="old('name')" required
                    autofocus autocomplete="name">

                <input id="email" type="email" placeholder="Email" name="email" :value="old('email')" required
                    autocomplete="username">

                <input name="password" id="password" placeholder="Senha" type="password" required autocomplete="new-password">

                <input id="password_confirmation" type="password" placeholder="Confirmar Senha"
                    name="password_confirmation" required autocomplete="new-password">

                <button type="submit">Registrar</button>
            </form>
        </div>

        <div class="form-container sign-in" id="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Log In </h1>
                <span></span>
                <input type="email" name="email" placeholder="Email" required autofocus>
                <input type="password" name="password" placeholder="Password" required>
                <div class="block mt-4 flex">
                    <label for="remember_me" class="checkbox-label">
                        <x-checkbox id="remember_me" name="remember" />
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
