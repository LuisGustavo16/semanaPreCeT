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

        <form class="formRegistroAluno" action="/cadastro/registrarUniversitario" method="POST">
            @csrf
            <div class='linhaFormAluno'>
                <div style="display: none;">
                    <input type="text" name="name" value="{{$user['name']}}">
                    <input type="text" name="email" value="{{$user['email']}}">
                    <input type="text" name="password" value="{{$user['password']}}">
                </div>
                <div class="campo" id="campo-cursoGraduação">
                    <label for="curso">*Curso:</label><br>
                    <select name="curso" required>
                        <option value="Sistemas de Informação">Sistemas de Informação</option>
                        <option value="Engenharia Civil">Engenharia Civil</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="matricula">*Matrícula:</label><br>
                    <input type="text" name="matricula" required>
                </div>

            </div>
    </div>

    </div>
    <button class="botaoFormAluno" type="submit">Registrar</button>
    </form>
    </div>

</body>

</html>