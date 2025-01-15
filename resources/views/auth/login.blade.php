<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="{{ asset('img/academia.ico') }}">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <title>GYN WORKOUTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: rgb(17, 143, 185)">
                <div class="featured-image mb-3">
                    <img src="/img/branco.png" class="img-fluid" style="width: 300px; margin-right: 15px">
                </div>
            </div>

            <div class="col-md-6 right-box">
                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="header-text mb-4">
                        <h2>Bem Vindo!</h2>
                        <p>Estamos felizes que você está de volta.</p>
                    </div>
                    <div class="input-group mb-3">
                        <x-input id="email" class="form-control form-control-lg bg-light fs-6" type="email"
                            name="email" :value="old('email')" required autofocus placeholder="Email address" />
                    </div>
                    <div class="input-group mb-1">
                        <x-input id="password" class="form-control form-control-lg bg-light fs-6" type="password"
                            name="password" required placeholder="Password" />
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                            <label for="remember_me" class="form-check-label text-secondary">
                                <small>Lembrar de mim</small>
                            </label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6">{{ __('Log in') }}</button>
                    </div>
                    <div class="row">
                        <small>Não tem conta? <a href="{{ route('register') }}">Registrar</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
