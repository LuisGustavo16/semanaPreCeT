<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    @vite(['resources/js/app.js'])
</head>

<body class="container">
    <div>
        <h1 class="sigee">SIGEE</h1>
        <h1 class="titulo">Crie seu cadastro</h1>
        <h3 class="desc">Para acessar o aplicativo SIGEE, é necessáio preencher corretamente o formulário abaixo.</h3>
    </div>

    <div class="fundoCadastrarAluno">

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
                            <input type="password" required>
                        </div>
                        <div class="campo inputSenha">
                            <label for="password">*Confirmar Senha:</label><br>
                            <input type="password" name="password" required>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <button class="botaoFormAluno" type="submit">Registrar</button>
    </form>
    </div>
</body>

</html>