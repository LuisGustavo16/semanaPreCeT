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

    .containerOpcoes {
        width: 100%;
        height: 100vh;
        display: grid;
        grid-template-rows: repeat(2, 15rem);
        align-items: center;
        justify-content: center;
        margin: 0rem;
        background-color: var(--white);
        text-align: center;
    }

    .modalOpcoes {
        display: grid;
        grid-template-columns: repeat(3, 20rem);
        justify-items: center;
        align-items: center;
        width: 100%;
    }

    .opcaoAluno {
        background-color: white;
        box-shadow: 0.1rem 0.1rem 0.3rem black;
        height: 12rem;
        width: 15rem;
        padding-left: 20px;
        padding-right: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .opcaoAluno:hover {
        background-color: rgba(255, 252, 71, 0.5);
    }


    h2 {
        width: 100%;
        text-align: center;
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
    }

    .apagarNotificacao {
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        font-size: 1.4rem;
    }

    .linkMsg {
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        font-weight: 900;
        text-decoration: none;
        font-size: 1.4rem;
    }


    @media (max-width: 991px) {
        .modalOpcoes {
            grid-template-columns: repeat(3, 18rem);
        }

        .opcaoAluno {
            width: 12rem;
        }
    }

    @media (max-width: 825px) {
        .modalOpcoes {
            grid-template-columns: repeat(1, 100%);
            grid-template-rows: repeat(3, 13rem);
        }

        .containerOpcoes {
            grid-template-rows: repeat(2, 22rem);
            grid-template-columns: repeat(1, 100%);
        }

        .opcaoAluno {
            width: 12rem;
        }
    }
</style>

<script>
    function statusNotificacao() {
        const notificacao = document.getElementsByClassName("apagarNotificacao")[0];
        notificacao.style.display = 'none';
    }
</script>

<body class="containerOpcoes">
    <div style="display: flex; align-items: center; justify-content: center; widht: 100%;">
        @if (isset($success))
            <div class="apagarNotificacao">
                {{$success}}
                <a class="linkMsg" onclick="statusNotificacao()" href="#">X</a>
            </div>
        @endif
    </div>
    <div class="modalOpcoes">
        <a href='/alunos/perfil/{{$aluno->id}}'>
            <div class="opcaoAluno">
                <h2>Ver dados do perfil</h2>
            </div>
        </a>

        <a href="/alunos/enviarTreinos/{{$aluno->id}}">
            <div style="" class="opcaoAluno">
                <h2>Realizar checkin</h2>
            </div>
        </a>

        <a href="/alunos/enviarFormReserva/{{$aluno->id}}">
            <div class="opcaoAluno">
                <h2>Realizar reserva</h2>
            </div>
        </a>
    </div>
</body>

</html>