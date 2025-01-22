<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    <style>
        :root {
            /*Cores do Site*/
            --white: #E6E8F4;
            --blue: #00198E;
            --yellow: #FFDF2B;
            --orange: #FFC24B;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Avantgardef", TeX Gyre Adventor, URW Gothic L, sans-serif;
            box-sizing: border-box;

            align-items: center;
            justify-content: center;
        }

        .formLogin {
            border-radius: 2rem;
            box-shadow: 0.1rem 0.1rem 1rem black;
            background-color: white;
            border: 3px solid black;
            display: grid;
            align-items: center;
            justify-content: center;
            height: 28rem;
            width: 30rem;
            grid-template-columns: repeat(1, 27rem);
            grid-template-rows: repeat(2, 8rem);
        }

        .inputEmailLogin {
            width: 25rem;
        }

        .botaoLogin {
            position: relative;
            height: 3rem;
            width: 10rem;
            margin-top: 9rem;
            background-color: var(--blue);
            color: white;
            font-size: 1.2rem;
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            border: 0;
            cursor: pointer;
        }

        .botaoLogin:hover {
            box-shadow: 0.1rem 0.1rem 1rem black;
            font-weight: 600;
        }

        .divLinksLogin {
            align-items: center;
            justify-content: center;
            display: grid;
            grid-template-rows: repeat(2, 4rem);
            z-index: 1022;
        }

        .linkCadastro {
            text-align: center;
            text-decoration: none;
            font-size: 1.3rem;
            color: var(--blue);
            text-shadow: 0.05rem 0.05rem 0.1rem black;
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        }

        .linkCadastro:hover {
            color: black;
        }

        .containerLogin {
            align-items: center;
            justify-content: center;
            border: 0rem;
            margin: 0rem;
            padding: 0rem;
        }

        .tituloLogin {
            text-align: center;
        }

        .linhaFormAluno {
            display: grid;
            grid-template-columns: repeat(3, 50%);
            grid-template-rows: repeat(1, 8rem);
            gap: 20px;
        }

        /* cabeçalho */
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

        .menu {
            display: flex;
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

        /*formulário*/
        form {
            border-radius: 2rem;
            box-shadow: 0.1rem 0.1rem 1rem black;
            margin: 5rem;
            margin-top: 3rem;
            padding: 3rem;
            padding-top: 0;
            background-color: white;
            border: 3px solid black;
            display: flex;
            height: 28rem;
            width: 70rem;
        }

        div.coluna {
            width: 20rem;
            row-gap: 5rem;
        }

        .campo {
            padding-top: 3rem;
        }

        label {
            font-size: 1.3rem;
            font-weight: 400;
            text-decoration: dashed;
        }

        input {
            padding-left: 0.5rem;
            font-size: 1.1rem;
            height: 2rem;
            width: 10rem;
            font-family: "Inter", sans-serif;
        }

        /*BOTÃO*/
        button.botao {
            position: relative;
            height: 2rem;
            width: 10rem;
            border-radius: 2rem;
            background-color: var(--blue);
            color: white;
            font-size: 1.2rem;
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            border: 0;
            cursor: pointer;
            bottom: -27rem;
            margin-left: 5rem;
        }

        button.botao:hover {
            box-shadow: 0.1rem 0.1rem 1rem black;
            font-weight: 700;
        }

        .caixa {
            align-items: center;
        }
    </style>


</head>

<body class="containerLogin">
    <div>
        <a href="{{route(name: 'welcome')}}" style="color: white; text-decoration: none;">
            <header>
                <img src="leticia.jpg" alt="logo">
                <h1>SIGEE Varginha</h1>
                <p">Bem-vindo ao Sistema de Gerenciamento Esportivo Escolar</p>
            </header>
        </a>

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
                <a class="linkCadastro"
                    href="https://www.varginha.cefetmg.br/wp-content/uploads/sites/11/2024/11/resolucao_dcvg-4-ginasio.pdf"
                    target="_blank">Regulamento</a>
                <a class="linkCadastro" href="{{route('gerarPDF')}}">Gerar PDF da Semana</a>
            </div>
        </nav>
    </div>


    <h1 class="tituloLogin">Entrar como Usuário</h1>
    <form class="formLogin" method="POST" action="/cadastro/entrar">
        @csrf

        <div>
            <label for="email">{{ __('Email:') }}</label>

            <div>
                <input id="email" type="email" class="inputEmailLogin" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus>
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

</body>

</html>