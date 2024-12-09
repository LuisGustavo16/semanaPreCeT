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
    <h3 class="desc">Para acessar o aplicativo SIGEE, é necessáio preencher corretamente o formulário abaixo. 
        Os campos * são de preenchimeno obrigatório.</h3>
    </div>
    
    <div class="fundoCadastrarAluno">
        
        <form class="formRegistroAluno" action="{{route('cadastroAluno')}}" method="POST">
            @csrf
            <div>
                <label for="tipo_usuario">*Tipo de Usuário:</label><br>
                <select name="tipo_usuario" id="tipo_usuario" required>
                    <option value="">Selecione</option>
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

                <div class='linhaFormAluno'>
                <div class="campo" id="campo-serie" style="display: none;">
                    <label for="turma">*Série</label><br>
                    <select name="turma" required>
                        <option value="1º">1º Ano</option>
                        <option value="2º">2º Ano</option>
                        <option value="3º">3º Ano</option>
                    </select>
                </div>

                <div class="campo" id="campo-curso" style="display: none;">
                    <label for="curso">*Curso:</label><br>
                    <select name="curso" required>
                        <option value="Edificações">Edificações</option>
                        <option value="Informática">Informática</option>
                        <option value="Mecatrônica">Mecatrônica</option>
                    </select>
                </div>

                </div>

                <div class="campo" id="campo-cursoGraduação" style="display: none;">
                    <label for="curso">*Curso:</label><br>
                    <select name="curso" required>
                        <option value="Edificações">Sistemas de Informação</option>
                        <option value="Informática">Engenharia Civil</option>
                    </select>
                </div>

                <div class='linhaFormAluno'>
                <div class="campo" id="campo-genero" style="display: none;">
                    <label for="genero">*Gênero:</label><br>
                    <select name="genero" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="campo" id="campo-matricula" style="display: none;">
                    <label for="matricula">*Matrícula:</label><br>
                    <input type="text" name="matricula" required>
                </div>
                </div>
            </div>

            </div>
            <button class="botaoFormAluno" type="submit">Registrar</button>
        </form>
    </div>


    <script>
        document.getElementById('tipo_usuario').addEventListener('change', function() {
        var tipo = this.value;

        document.getElementById('campo-genero').style.display = 'none';
        document.getElementById('campo-serie').style.display = 'none';
        document.getElementById('campo-curso').style.display = 'none';
        document.getElementById('campo-matricula').style.display = 'none';
        document.getElementById('campo-cursoGraduação').style.display = 'none';

        if (tipo === 'aluno_tecnico') {
            document.getElementById('campo-genero').style.display = 'block';
            document.getElementById('campo-serie').style.display = 'block';
            document.getElementById('campo-curso').style.display = 'block';
            document.getElementById('campo-matricula').style.display = 'block';
        } else if (tipo === 'aluno_graduacao') {
            document.getElementById('campo-cursoGraduação').style.display = 'block';
            document.getElementById('campo-matricula').style.display = 'block';
        } else if (tipo === 'professor') {
        }
    });
    </script>

</body>

</html>