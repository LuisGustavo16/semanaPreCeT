<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    @vite(['resources/js/app.js'])
</head>

<body class="containerRegistro">
    <div class="textoRegistro">
        <h1 class="sigee">SIGEE</h1>
    </div>

    <form class="formRegistroInicio" action="/alunos/validarCadastro" method="POST">
        @csrf
        <div class="colunaFormAluno">
            <div>

                <div class="campo">
                    <label for="email">*Email:</label><br>
                    <input class="inputEmail" type="email" name="email" required>
                </div>

                <div class="divSenhas">
                    <div class="campo inputSenha">
                        <label for="password">*Senha:</label><br>
                        <input type="password" required>
                    </div>
                </div>

            </div>
        </div>


        <div style="width: 100%; display: flex; align-itens: center">
            <button id="botao" class="botaoFormAluno" type="submit">Validar</button>
        </div>

    </form>
</body>

</html>