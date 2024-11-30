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
        <h1 class="titulo">Perfil do Estudante</h1>
    </div>

    <div class="fundoCadastrarAluno">

    
    <form class="formRegistroAluno" action="/alunos/editarPerfil/{{$aluno->id}}" method="POST">
            @csrf
            <div class="colunaFormAluno">

                <label for="Nome">*Nome:</label><br>
                <input class="inputNome" type="text" name="name" required value="{{$aluno->name}}">

                <div class="linhaFormAlunoEmail">
                    <div class="campo">
                        <label for="email">*Email:</label><br>
                        <input class="inputEmail" type="email" name="email" required value="{{$aluno->email}}">
                    </div>

                </div>

                <div class="linhaFormAluno">
                    <div class="campo">
                        <label for="turma">*Série</label><br>
                        <select type="checkbox" name="turma" required value="{{$aluno->turma}}">
                            <option value="1º">1º Ano</option>
                            <option value="2º">2º Ano</option>
                            <option value="3º">3º Ano</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="curso">*Curso:</label><br>
                        <select type="checkbox" name="curso" required value="{{$aluno->curso}}">
                            <option value="Edificações">Edificações</option>
                            <option value="Informática">Informática</option>
                            <option value="Mecatrônica">Mecatrônica</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label for="genero">*Gênero:</label><br>
                        <select type="checkbox" name="genero" required value="{{$aluno->genero}}">
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                </div>


                <div class="linhaFormAluno">
                    <div class="campo">
                        <label for="dataNascimento">*Data de Nascimento:</label><br>
                        <input type="date" name="dataNascimento" required value="{{$aluno->dataNascimento}}">
                    </div>
                    <div class="campo">

                        <label class="inputMatricula" for="matricula">*Matrícula:</label><br>
                        <input class="inputMatricula" type="text" name="matricula" required
                            value="{{$aluno->matricula}}">
                    </div>
                </div>

            </div>
            <button class="botaoFormAluno" type="submit">Enviar</button>
        </form>

    </div>
</body>

</html>