<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    <style>
        header {
            background-color: #004080;
            color: #fff;
            padding: 20px;
            text-align: center;
            
        }

        header img {
            width: 100px;
            /* ajustar o tamanho da logo */
            vertical-align: middle;
            margin-right: 10px;
        }

        nav {
            background-color: #003366;
            justify-content: center;
            padding: 10px;
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .menu {
            display: flex;

            padding: 10px;
        }

        .menu a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        .menu a:hover {
            text-decoration: underline;
        }


        .menu-icon {
            display: none;
            flex-direction: column;
            cursor: pointer;
            margin-left: auto;
        }

        .menu-icon span {
            background-color: #fff;
            height: 4px;
            width: 30px;
            margin: 4px 0;
        }


        @media (max-width: 768px) {

            .menu {
                display: none;
                flex-direction: column;
                width: 100%;
            }

            .menu a {
                margin: 10px 0;
            }

            .menu-icon {
                display: flex;
            }

            #menu-toggle:checked+.menu-icon+.menu {
                display: flex;
            }

        }
    </style>

    @vite(['resources/js/app.js'])
</head>

<body class="containerLogin">

    <div>
        <header>
            <h1>SIGEE Varginha</h1>
            <p>Bem-vindo ao Sistema de Gerenciamento Esportivo Escolar</p>
        </header>

        <nav>
            <input type="checkbox" id="menu-toggle" class="menu-toggle" hidden>
            <label for="menu-toggle" class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <div class="menu">
                <a class="linkCadastro" href="{{route('entrarAluno')}}">Entrar como estudante</a>
                <a class="linkCadastro" href="/login">Entrar como administrador</a>
                <a class="linkCadastro" href="/CadastroInicial">Se registrar</a>
                <a href="https://www.varginha.cefetmg.br/wp-content/uploads/sites/11/2024/11/resolucao_dcvg-4-ginasio.pdf"
                    target="_blank">Regulamento</a>
                <a class="buttonGerarPDF" href="{{route('gerarPDF')}}">Gerar PDF da Semana</a>
            </div>
        </nav>

        <h1 class="tituloLogin">Entrar como Usuário</h1>
        <form class="formLogin" method="POST" action="/cadastro/entrar">
            @csrf

            <div>
                <label for="email">{{ __('Email:') }}</label>

                <div>
                    <input id="email" type="email" class="inputEmailLogin" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                </div>
            </div>

            <div>
                <label for="password">{{ __('Senha:') }}</label>

                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                </div>
            </div>

            <div>
                <div>
                    <button type="submit" class="botaoLogin">
                        {{ __('Entrar') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="divLinksLogin">
            <a class="linkCadastro" href="/login">Entrar como administrador</a>
            <a class="linkCadastro" href="/CadastroInicial">Se registrar como usuário</a>
        </div>
    </div>
</body>

</html>