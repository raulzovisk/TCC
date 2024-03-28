<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('welcome.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Bem Vindo</title>
</head>

<body>
    <header>
        <div id="title">
            <img id="logo" src="/img/logo.png" alt="" style="width: 100px;">
        </div>

        <ul>
            <a href="#">
                <li>Início</li>
            </a>
            <a href="#">
                <li>Serviços</li>
            </a>
            <a href="#">
                <li>Sobre</li>
            </a>
            <a href="#">
                <li>Contato</li>
            </a>
        </ul>
    </header>

    <main>
        <aside>
            <h2><span>Comece agora</span></h2>
            <h2>na GYIN WORKOUTS</h2>
            <p>
                Bem-vindo a GYIN WORKOUTS, sua plataforma completa para transformar sua jornada de fitness. Não importa
                se você é um iniciante ou um veterano no mundo do fitness, nosso site oferece uma variedade de rotinas
                de treino projetadas por especialistas da GYIN
                WORKOUTS para atender às suas necessidades e objetivos específicos.
            </p>
            <p>Junte-se a nossa comunidade e comece a alcançar seus objetivos de forma mais inteligente e eficaz.
                Explore nosso site hoje e descubra como podemos ajudá-lo a elevar seu treinamento para o próximo nível.
                A transformação está ao seu alcance!
            </p>
            <form>
                <div class="botao">
                    <a id="abtn" href="{{ route('login') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                        Comece Agora >
                    </a>
                </div>

            </form>
        </aside>

        <article>
            <img src="/img/pseo.png" alt="mulher-roxa">
        </article>
    </main>

</body>

</html>
