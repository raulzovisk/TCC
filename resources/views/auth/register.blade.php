<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="imagex/png" href="{{ asset('img/academia.ico') }}">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>GYN WORKOUTS</title>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: rgb(17, 143, 185)">
                <div class="featured-image mb-3">
                    <img src="/img/branco.png" class="img-fluid" style="width: 250px;">
                </div>
            </div>

            <div class="col-md-6 right-box">
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="header-text mb-4">
                        <h2>Bem Vindo!</h2>
                        <p>Crie sua conta para começar.</p>
                    </div>

                    <div class="input-group mb-3">
                        <x-input id="name" class="form-control form-control-lg bg-light fs-6" type="text"
                            name="name" :value="old('name')" required autofocus placeholder="Nome" />
                    </div>
                    <div class="input-group mb-3">
                        <x-input id="email" class="form-control form-control-lg bg-light fs-6" type="email"
                            name="email" :value="old('email')" required placeholder="Email" />
                    </div>
                    <div class="input-group mb-3">
                        <x-input id="password" class="form-control form-control-lg bg-light fs-6" type="password"
                            name="password" required placeholder="Senha" />
                    </div>
                    <div class="input-group mb-3">
                        <x-input id="password_confirmation" class="form-control form-control-lg bg-light fs-6"
                            type="password" name="password_confirmation" required placeholder="Confirmar Senha" />
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6">{{ __('Registrar') }}</button>
                    </div>
                    <div class="row">
                        <small>Já possui cadastro? <a href="{{ route('login') }}">Log in</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
