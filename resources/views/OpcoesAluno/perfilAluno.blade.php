<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    <script>
        function statusNotificacao() {
            const notificacao = document.getElementsByClassName("divNotificacao")[0];
            notificacao.style.display = 'none';
        }
    </script>
    <style>
        :root {
            /*Cores do Site*/
            --white: #E6E8F4;
            --blue: #00198E;
            --yellow: #FFDF2B;
            --orange: #FFC24B;
        }

        .linkEditarPerfil {
            text-decoration: none;
            color: var(--blue);
            font-size: 1.5rem;
            font-weight: 800;
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        }

        .linkEditarPerfil:hover {
            color: black;
        }

        .container {
            width: 100%;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background: var(--white);
            margin: 0px;
            grid-template-rows: repeat(3, 12rem);
            font-family: Arial, sans-serif;
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
            height: 37rem;
            box-shadow: 0.1rem 0.1rem 0.9rem black;
            margin-top: 1rem;
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
    </style>
</head>

@extends ('cabecalho3')
@section('content')

<body class="container">
    <h1>Perfil do {{$aluno->tipo}}</h1>
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

    <div style="display: flex; width: 100%; align-itens: center; justify-content: center;">
        <form>
            @csrf

            <div>
                <label for="Nome">*Nome:</label>
                <input type="text" name="name" required value="{{$aluno->name}}" readonly>
            </div>


            <div>
                <label for="email">*Email:</label><br>
                <input type="email" name="email" required readonly value="{{$aluno->email}}">
            </div>



            @if ($aluno->tipo == 'Aluno')
                <div>
                    <label for="turma">*Série</label><br>
                    <input type="text" name="turma" required value="{{$aluno->turma}}" readonly>
                </div>

                <div>
                    <label for="curso">*Curso:</label><br>
                    <input type="text" name="curso" required value="{{$aluno->curso}}" readonly>
                </div>

                <div>
                    <label for="dataNascimento">*Data de Nascimento:</label><br>
                    <input type="date" name="dataNascimento" required value="{{$aluno->dataNascimento}}" readonly>
                </div>
                <div>

                    <label for="matricula">*Matrícula:</label><br>
                    <input type="text" name="matricula" required value="{{$aluno->matricula}}" readonly>
                </div>

                <div>
                    <label for="genero">*Gênero:</label><br>
                    <input type="text" name="genero" required value="{{$aluno->genero}}" readonly>
                </div>


            @elseif ($aluno->tipo == 'Universitário')
                <div>
                    <label for="curso">*Curso:</label><br>
                    <input type="text" name="curso" required value="{{$aluno->curso}}" readonly>
                </div>
                <div>

                    <label for="matricula">*Matrícula:</label><br>
                    <input type="text" name="matricula" required value="{{$aluno->matricula}}" readonly>
                </div>
            @endif
            <a class="linkEditarPerfil" href="/alunos/formEditPerfil/{{$aluno->id}}">Editar Perfil</a>
        </form>
    </div>

    @endsection

</html>