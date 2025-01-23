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

        @media (max-width: 320px) {
            .divLogin {
                width: 100%;
                display: block;
                align-items: center;
            }

            .formLogin {
                margin: 1rem;
                padding: 1rem;
                grid-template-columns: repeat(1, 100%);
                grid-template-rows: repeat(2, 8rem);
                width: 70%;
                margin-left: 2rem;

            }

            .inputEmailLogin {
                width: 95%;
            }

            .botaoLogin {
                position: relative;
                height: 3rem;
                width: 6rem;
            }
        }

        @media (max-width: 546px) {
            .divLogin {
                width: 100%;
                display: block;
                align-items: center;
            }

            .formLogin {
                margin: 1rem;
                padding: 1rem;
                grid-template-columns: repeat(1, 100%);
                grid-template-rows: repeat(2, 8rem);
                width: 70%;
                margin-left: 10%;
            }

            .inputEmailLogin {
                width: 95%;
            }

            .botaoLogin {
                position: relative;
                height: 3rem;
                width: 6rem;
            }
        }
    </style>

</head>

@extends ('cabecalho2')
@section('content')
<body class="containerLogin">
    <div>
        <h1 class="tituloLogin">Entrar como Administrador</h1>
        <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
            <form class="formLogin" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email">{{ __('Email:') }}</label>

                    <div>
                        <input id="email" type="email" class="inputEmailLogin" name="email" value="{{ old('email') }}"
                            required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password">{{ __('Senha:') }}</label>

                    <div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror inputEmailLogin" name="password"
                            required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
        </div>

    </div>
</body>
@endsection
</html>