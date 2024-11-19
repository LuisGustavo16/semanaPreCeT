<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    @vite(['resources/js/app.js'])
</head>

<body class="container">
    <div class="fundoCadastrarAluno">
        <form class="formRegistroAluno" action="{{route("cadastroAluno")}}" method="POST">
            @csrf
            <div class="colunaFormAluno">

                    <label for="Nome">*Nome:</label><br>
                    <input class="inputNome" type="text" name="name" required>

                <div class="linhaFormAlunoEmail">
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

                <div class="linhaFormAluno">
                    <div class="campo">
                        <label for="turma">*Série</label><br>
                        <select type="checkbox" name="turma" required>
                            <option value="1º">1º Ano</option>
                            <option value="2º">2º Ano</option>
                            <option value="3º">3º Ano</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="curso">*Curso:</label><br>
                        <select type="checkbox" name="curso" required>
                            <option value="Edificações">Edificações</option>
                            <option value="Informática">Informática</option>
                            <option value="Mecatrônica">Mecatrônica</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label for="genero">*Gênero:</label><br>
                        <select type="checkbox" name="genero" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                </div>


                <div class="linhaFormAluno">
                    <div class="campo">
                        <label for="dataNascimento">*Data de Nascimento:</label><br>
                        <input type="date" name="dataNascimento" required>
                    </div>
                    <div class="campo">
     
                        <label class="inputMatricula" for="matricula">*Matrícula:</label><br>
                        <input class="inputMatricula" type="text" name="matricula" required>
                    </div>
                </div>

            </div>

            <button class="botaoFormAluno" type="submit">Registrar</button>
        </form>
    </div>
</body>

</html>