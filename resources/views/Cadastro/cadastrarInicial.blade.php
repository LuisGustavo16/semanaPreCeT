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
        <h1 class="titulo">Crie seu cadastro</h1>
        <h3 class="desc">Para acessar o aplicativo SIGEE, é necessáio preencher corretamente o formulário abaixo.</h3>
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
                    <h6 id="mensagemAlerta" style="display: none; height: 1rem">As senhas não coincidem</h6>
                </div>
            </div>

    </div>

    <div style="width: 100%; display: flex; align-itens: center">
        <button id="botao" class="botaoFormAluno" type="submit">Registrar</button>
    </div>

    </form>
    <div class="divLinksLogin">
        <a class="linkCadastro" href="/login">Entrar como administrador</a>
        <a class="linkCadastro" href="{{route("entrarAluno")}}">Entrar como estudante</a>
    </div>
    </div>
</body>

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