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
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0rem;
        background-color: var(--white);
    }

    .modalOpcoes {
        display: grid;
        grid-template-columns: repeat(3, 20rem);
        justify-items: center;
        align-items: center; 
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
    

    h2 {
        width: 100%;
        text-align: center;
        font-family: "Inter", sans-serif;
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
            grid-template-columns: repeat(1, 18rem);
            grid-template-rows: repeat(3, 13rem);
        }

        .opcaoAluno {
            width: 12rem;
        }
    }
</style>

<body class="containerOpcoes">
    <div class="modalOpcoes">
        <div class="opcaoAluno">
            <h2>Ver dados do perfil</h2>
        </div>

        <div style="" class="opcaoAluno">
            <h2>Realizar checkin</h2>
        </div>

        <div class="opcaoAluno">
            <h2>Realizar reserva</h2>
        </div>
    </div>
</body>

</html>