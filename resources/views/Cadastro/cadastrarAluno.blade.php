<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    @vite(['resources/js/app.js'])

    <style>
        /* Responsividade */
        @media (max-width: 1200px) {
    .linhaFormAluno {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .linhaFormAluno {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .formRegistroAluno {
        width: 100%;
        max-width: 100%;
        padding: 2rem;
    }

    .botaoFormAluno {
        width: 100%;
        max-width: 100%;
        padding-left: 2rem;
        padding-right: 2rem;
        font-size: 120%;
    }

    .inputNome, .inputEmail, .inputCurso {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .sigee {
        font-size: 250%;
    }

    .titulo {
        font-size: 1.5rem;
    }

    .desc {
        font-size: 1rem;
    }

    .campo label {
        font-size: 0.9rem;
    }

    .formRegistroAluno {
        padding: 1rem;
    }

    .botaoFormAluno {
        font-size: 110%;
    }
}
    </style>
</head>

<body class="container">
    <div>
        <h1 class="sigee">SIGEE</h1>
        <h1 class="titulo">Crie seu cadastro</h1>
        <h3 class="desc">Para acessar o aplicativo SIGEE, é necessáio preencher corretamente o formulário abaixo.
            Os campos * são de preenchimeno obrigatório.</h3>
    </div>

    <div class="fundoCadastrarAluno">

        <form class="formRegistroAluno" action="/cadastro/registrarAluno" method="POST">
            @csrf
            <div class='linhaFormAluno'>
                <div style="display: none;">
                    <input type="text" name="name" value="{{$user['name']}}">
                    <input type="text" name="email" value="{{$user['email']}}">
                    <input type="text" name="password" value="{{$user['password']}}">
                </div>
                <div class="campo">
                    <label for="turma">*Série</label><br>
                    <select name="turma" required>
                        <option value="1º">1º Ano</option>
                        <option value="2º">2º Ano</option>
                        <option value="3º">3º Ano</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="curso">*Curso:</label><br>
                    <select name="curso" required>
                        <option value="Edificações">Edificações</option>
                        <option value="Informática">Informática</option>
                        <option value="Mecatrônica">Mecatrônica</option>
                    </select>
                </div>

            </div>

            <div class='linhaFormAluno'>
                <div class="campo">
                    <label for="genero">*Gênero:</label><br>
                    <select name="genero" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="matricula">*Matrícula:</label><br>
                    <input type="text" name="matricula" required>
                </div>
            </div>

            <div class='linhaFormAluno'>
                <div class="campo">
                    <label for="genero">*Data de Nascimento:</label><br>
                    <input name="dtNascimento" type="date">
                </div>
            </div>
    </div>

    </div>
    <button class="botaoFormAluno" type="submit">Registrar</button>
    </form>
    </div>

</body>

</html>