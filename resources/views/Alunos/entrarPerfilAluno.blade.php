<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>

<body class="containerLogin">
        <div>
            <h1 class="tituloLogin">Entrar como Estudante</h1>
            <form class="formLogin" method="POST" action="/alunos/entrar">
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
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
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
                <a class="linkCadastro" href="/Cadastrar">Se registrar como estudante</a>
            </div>
        </div>
</body>

</html>