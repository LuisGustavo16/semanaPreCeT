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

        /*Página do Formulario de Cadastro dos Alunos*/

        .container {
            display: block;
            height: 100vh;
            padding: 20px;
        }


        .titulo {
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            text-align: center;
        }

        .desc {
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            font-size: larger;
            text-align: center;
            padding: 0rem;
            font-weight: normal;
        }

        .sigee {
            font-family: Blippo, fantasy;
            font-size: 350%;
            text-align: center;
        }

        .fundoCadastrarAluno {
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .formRegistroInicio {
            box-shadow: 2px 2px 5px black;
            padding: 3rem;
            padding-top: 0;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            height: auto;
            width: 60%;
            margin: 0 auto;
        }

        .formRegistroAluno {
            box-shadow: 2px 2px 5px black;
            padding: 3rem;
            padding-top: 0;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            height: auto;
            width: 40%;
            max-width: 70rem;
            margin: 0 auto;
        }


        .colunaFormAluno {
            width: 90%;
            padding-top: 3rem;
        }

        .linhaFormUniversitario {
            display: grid;
            grid-template-columns: repeat(1, 25rem);
            grid-template-rows: repeat(1, 8rem);
            gap: 20px;
        }

        .linhaFormAlunoEmail {
            display: grid;
            grid-template-columns: repeat(3, 25rem);
            grid-template-rows: repeat(1, 8rem);
            gap: 20px;
        }

        .labelTipoUser {
            padding-top: 3rem;
        }

        .inputNome,
        .inputCurso,
        .inputEmail {
            width: 100%;
        }

        .divSenhas {
            display: flex;
            gap: 20px;
        }


        .inputSenha {
            margin-left: 0;
        }

        .botaoFormAluno {
            height: 3rem;
            width: 10rem;
            padding-left: 2rem;
            padding-right: 2rem;
            border-radius: 5px;
            background-color: var(--blue);
            color: white;
            font-size: 130%;
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            font-weight: bold;
            cursor: pointer;
        }

        select {
            width: 100%;
            box-sizing: border-box;
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

        select {
            padding-left: 0.5rem;
            font-size: 1.1rem;
            height: 3rem;
            width: 100%;
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

            .divSenhas {
                display: block
            }

        }
    </style>

</head>

@extends ('cabecalho2')
@section('content')
<body class="containerRegistro">
    <div>
        <div class="textoRegistro">
            <h1 class="titulo">Crie seu cadastro</h1>
            <h3 class="desc">Para acessar o aplicativo SIGEE, é necessáio preencher corretamente o formulário abaixo.
            </h3>
        </div>

        <div class="">

            <form class="formRegistroInicio" action="{{route('cadastroInicio')}}" method="POST">
                @csrf
                <div class="colunaFormAluno">
                    <label for="tipo_usuario">*Tipo de Usuário:</label><br>
                    <select name="tipo_usuario" id="tipo_usuario" required>
                        <option value="professor">Professor/Ajudante</option>
                        <option value="aluno_tecnico">Aluno Técnico</option>
                        <option value="aluno_graduacao">Aluno Graduação</option>
                    </select>
                </div>

                <div class="colunaFormAluno">
                    <label for="Nome">*Nome:</label><br>
                    <input class="inputNome" type="text" name="name" required>

                    <div>
                        <div class="campo">
                            <label for="email">*Email:</label><br>
                            <input class="inputEmail" type="email" name="email" required>
                        </div>
                        <div class="divSenhas">
                            <div class="campo inputSenha">
                                <label for="password">*Senha:</label><br>
                                <input onblur=verificarSenha() id="senha1" type="password" required>
                            </div>
                            <div class="campo inputSenha">
                                <label for="password">*Confirmar Senha:</label><br>
                                <input onblur=verificarSenha() id="senha2" type="password" name="password" required>
                            </div>
                        </div>
                        <h6 id="mensagemAlerta" style="display: none; height: 1rem; font-size: 1.2rem">As senhas não
                            coincidem</h6>
                    </div>
                </div>

        </div>

        <div style="display: flex; width: 100%; align-itens: center; justify-content: center; margin-top: 2rem">
            <button class="botaoFormAluno" type="submit">Registrar</button>
        </div>

        </form>
    </div>
    </div>
</body>
@endsection
</html>
<script>
    function verificarSenha() {
        senha1 = document.getElementById('senha1')
        senha2 = document.getElementById('senha2')
        mensagemAlerta = document.getElementById('mensagemAlerta')
        botao = document.getElementById('botao')

        console.log(senha1)
        console.log(senha2)

        if (senha1.value != senha2.value) {
            mensagemAlerta.style.display = 'block'
            botao.disabled = true
        } else {
            mensagemAlerta.style.display = 'none'
            botao.disabled = false
        }
    }

    window.onload = function () {
        botao = document.getElementById('botao')
        botao.disabled = true
    };

</script>