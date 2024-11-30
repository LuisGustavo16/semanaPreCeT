<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    @vite(['resources/js/app.js'])
    <script>
        function statusNotificacao() {
            const notificacao = document.getElementsByClassName("divNotificacao")[0];
            notificacao.style.display = 'none';
        }
    </script>
</head>

<body class="container">
    <div>
        <h1 class="sigee">SIGEE</h1>
        <h1 class="titulo">Perfil do Estudante</h1>
    </div>
    <div class="divNotificacao" style="display: flex;">
        @if(isset($danger))
            <div class="danger">
                {{$danger}}
                <a onclick="statusNotificacao()" href="#" class="apagarNotificacao">X</a>
            </div>
        @elseif (isset($success))
            <div class="success">
                {{$success}}
                <a onclick="statusNotificacao()" href="#" class="apagarNotificacao">X</a>
            </div>
        @endif
    </div>

    <div class="">

        <form class="formRegistroAluno">
            @csrf
            <div class="colunaFormAluno">

                <label for="Nome">*Nome:</label><br>
                <input class="inputNome" type="text" name="name" required value="{{$aluno->name}}" readonly>

                <div class="linhaFormAlunoEmail">
                    <div class="campo">
                        <label for="email">*Email:</label><br>
                        <input class="inputEmail" type="email" name="email" required readonly value="{{$aluno->email}}">
                    </div>

                </div>

                <div class="linhaFormAluno">
                    <div class="campo">
                        <label for="turma">*Série</label><br>
                        <input type="text" name="turma" required value="{{$aluno->turma}}" readonly>
                    </div>

                    <div class="campo">
                        <label for="curso">*Curso:</label><br>
                        <input type="text" name="curso" required value="{{$aluno->curso}}" readonly>
                    </div>
                    <div class="campo">
                        <label for="genero">*Gênero:</label><br>
                        <input type="text" name="genero" required value="{{$aluno->genero}}" readonly>
                    </div>
                </div>


                <div class="linhaFormAluno">
                    <div class="campo">
                        <label for="dataNascimento">*Data de Nascimento:</label><br>
                        <input type="date" name="dataNascimento" required value="{{$aluno->dataNascimento}}" readonly>
                    </div>
                    <div class="campo">

                        <label class="inputMatricula" for="matricula">*Matrícula:</label><br>
                        <input class="inputMatricula" type="text" name="matricula" required
                            value="{{$aluno->matricula}}" readonly>
                    </div>
                </div>

            </div>
        </form>
        <div class="divLinksLogin editarPerfil">
            <a class="linkCadastro" href="/alunos/formEditPerfil/{{$aluno->id}}">Editar Perfil</a>
        </div>
    </div>

</html>