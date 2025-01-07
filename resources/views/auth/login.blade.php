<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    @vite(['resources/js/app.js'])
</head>

<body class="containerLogin">
        <div>
            <h1 class="tituloLogin">Entrar como Administrador</h1>
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
                            class="form-control @error('password') is-invalid @enderror inputEmailLogin" name="password" required
                            autocomplete="current-password">

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
            <div class="divLinksLogin">
                <a class="linkCadastro" href="{{route("entrarAluno")}}">Entrar como estudante</a>
                <a class="linkCadastro" href="/CadastroInicial">Registre-se</a>
            </div>
        </div>
</body>

</html>