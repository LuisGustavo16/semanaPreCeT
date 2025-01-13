<?php
$aux = true;
$aux2 = true;
$aux3 = true;
$aux4 = true;
$generos = ["Masculino", "Feminino"];
$cursos = ['Edificações', 'Informática', 'Mecatrônica'];
$cursosGraduacao = ['Sistemas de Informação', 'Engenharia Civil'];
$turmas = ['1º', '2º', '3º']
    
?>
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
        <h1 class="titulo">Editar Perfil</h1>
    </div>

    <div class="fundoCadastrarAluno">


        <form class="formRegistroAluno" action="/alunos/editarPerfil/{{$aluno->id}}" method="POST">
            @csrf
            <div class="colunaFormAluno">

                <div class="campo">
                    <label for="Nome">*Nome:</label><br>
                    <input class="inputNome" type="text" name="name" required value="{{$aluno->name}}">
                </div>

                    <div class="campo">
                        <label for="email">*Email:</label><br>
                        <input class="inputEmail" type="email" name="email" required value="{{$aluno->email}}">

                </div>
                @if ($aluno->tipo == 'Aluno')
                    <div class="linhaFormAluno">
                        <div class="campo">
                            <label for="turma">*Série</label><br>
                            <select style="width: 5rem" class="selectGenero" type="checkbox" name="curso">
                                @foreach ($turmas as $item)
                                    @if ($aux3)
                                        <option value="{{$aluno->turma}}">{{$aluno->turma}}</option>
                                        {{$aux3 = false}}
                                    @endif
                                    @if ($item != $aluno->turma)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="campo">
                            <label for="curso">*Curso:</label><br>
                            <select class="selectGenero" type="checkbox" name="curso">
                                @foreach ($cursos as $item)
                                    @if ($aux2)
                                        <option value="{{$aluno->curso}}">{{$aluno->curso}}</option>
                                        {{$aux2 = false}}
                                    @endif
                                    @if ($item != $aluno->curso)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endif
                                @endforeach
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

                    <div class="linhaFormAluno">
                        <div class="campo">
                            <label for="genero">*Gênero:</label><br>
                            <select class="selectGenero" type="checkbox" name="genero">
                                @foreach ($generos as $genero)
                                    @if ($aux)
                                        <option value="{{$aluno->genero}}">{{$aluno->genero}}</option>
                                        {{$aux = false}}
                                    @endif
                                    @if ($genero != $aluno->genero)
                                        <option value="{{$genero}}">{{$genero}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                @elseif ($aluno->tipo == 'Universitário')
                    <div class="campo">
                        <label for="curso">*Curso:</label><br>
                        <select class="" type="checkbox" name="curso">
                                @foreach ($cursosGraduacao as $item)
                                    @if ($aux4)
                                        <option value="{{$aluno->curso}}">{{$aluno->curso}}</option>
                                        {{$aux4 = false}}
                                    @endif
                                    @if ($item != $aluno->curso)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endif
                                @endforeach
                            </select>
                    </div>
                    <div class="campo">

                        <label class="inputMatricula" for="matricula">*Matrícula:</label><br>
                        <input class="inputMatricula" type="text" name="matricula" required value="{{$aluno->matricula}}">
                    </div>

                @endif


            </div>
            <button class="botaoFormAluno" type="submit">Enviar</button>
        </form>

    </div>
</body>

</html>