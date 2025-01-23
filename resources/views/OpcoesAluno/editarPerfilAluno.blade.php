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
</head>
<style>
    :root {
        /*Cores do Site*/
        --white: #E6E8F4;
        --blue: #00198E;
        --yellow: #FFDF2B;
        --orange: #FFC24B;
    }

    .container {
        display: grid;
        width: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
        background: var(--white);
        margin: 0px;
        grid-template-rows: repeat(3, 1);
    }


    h1 {
        width: 100%;
        text-align: center;
        height: 10px;
        font-size: 2rem;
        font-weight: 800;
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        text-decoration: dashed;
    }

    form {
        background-color: white;
        display: grid;
        grid-template-columns: repeat(1, 100%);
        grid-template-rows: repeat(8, 5rem);
        padding: 1rem;
        width: 20rem;
        box-shadow: 0.1rem 0.1rem 0.9rem black;
    }

    label {
        font-size: 1.3rem;
        font-weight: 400;
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        text-decoration: dashed;
        margin-bottom: 20px;
    }

    input {
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        font-size: 1.1rem;
        height: 2rem;
    }

    select {
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        font-size: 1.3rem;
    }

    div {
        display: block
    }

    button {
        background-color: var(--blue);
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        color: white;
        font-size: 1.35rem;
        font-weight: 800;
    }

    select {
        height: 2rem;
    }
</style>

<body class="container">
    <h1>Editar Perfil</h1>
    <form action="/alunos/editarPerfil/{{$aluno->id}}" method="POST">
        @csrf
        <div>
            <label for="Nome">*Nome:</label><br>
            <input type="text" name="name" required value="{{$aluno->name}}">
        </div>

        <div>
            <label for="email">*Email:</label><br>
            <input type="email" name="email" required value="{{$aluno->email}}">

        </div>
        @if ($aluno->tipo == 'Aluno')
            <div>
                <label for="turma">*Série</label><br>
                <select type="checkbox" name="curso">
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

            <div>
                <label for="curso">*Curso:</label><br>
                <select type="checkbox" name="curso">
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

             <div>
                <label for="genero">*Gênero:</label><br>
                <select type="checkbox" name="genero">
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

            <div>
                <label for="dataNascimento">*Data de Nascimento:</label><br>
                <input type="date" name="dataNascimento" required value="{{$aluno->dataNascimento}}">
            </div>

            <div>
                <label for="matricula">*Matrícula:</label><br>
                <input type="text" name="matricula" required value="{{$aluno->matricula}}">
            </div>


        @elseif ($aluno->tipo == 'Universitário')
            <div>
                <label for="curso">*Curso:</label><br>
                <select type="checkbox" name="curso">
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
            <div>

                <label for="matricula">*Matrícula:</label><br>
                <input type="text" name="matricula" required value="{{$aluno->matricula}}">
            </div>

        @endif
        <button class="botaoFormAluno" type="submit">Enviar</button>
    </form>
</body>

</html>