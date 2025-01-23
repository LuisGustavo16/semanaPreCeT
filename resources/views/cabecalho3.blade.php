<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
    <style>
        :root {
            /*Cores do Site*/
            --white: #E6E8F4;
            --blue: #00198E;
            --yellow: #FFDF2B;
            --orange: #FFC24B;
            --yellowSecondary: #FFF1A8;
            --bottonAccept: #A2F294;
            --bottonAcceptSecondary: #4F9552;
            --bottonRecuse: #F87D7D;
            --bottonRecuseSecondary: #AC3C3C;
        }

        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #004080;
            color: #fff;
            padding: 20px;
            text-align: center;

        }


        header img {
            width: 100px;
            /* ajustar o tamanho da logo */
            vertical-align: middle;
            margin-right: 10px;
        }

        nav {
            background-color: #003366;
            justify-content: center;
            padding: 10px;
        }

        .menu {
            display: flex;
            padding: 10px;
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            text-decoration: underline;
        }


        .menu a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        .menu a:hover {
            text-decoration: underline;
            color: var(--orange)
        }


        .menu-icon {
            display: none;
            flex-direction: column;
            cursor: pointer;
            margin-left: auto;
        }

        .menu-icon span {
            background-color: #fff;
            height: 4px;
            width: 30px;
            margin: 4px 0;
        }



        @media (max-width: 768px) {

            .menu {
                display: none;
                flex-direction: column;
            }

            .menu a {
                margin: 10px 0;
            }

            .menu-icon {
                display: flex;
            }

            #menu-toggle:checked+.menu-icon+.menu {
                display: flex;
            }

        }
    </style>
</head>

<body>
    <a href="{{route(name: 'welcome')}}" style="color: white; text-decoration: none;">
        <header>
            <img src="leticia.jpg" alt="logo">
            <h1>SIGEE Varginha</h1>
            <p">Bem-vindo ao Sistema de Gerenciamento Esportivo Escolar</p>
        </header>
    </a>


    <nav>
        <input type="checkbox" id="menu-toggle" class="menu-toggle" hidden>
        <label for="menu-toggle" class="menu-icon">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <div class="menu">
            <a href="{{route(name: 'welcome')}}">Sair</a>
            <a href="https://www.varginha.cefetmg.br/wp-content/uploads/sites/11/2024/11/resolucao_dcvg-4-ginasio.pdf"
                target="_blank">Regulamento</a>
            <a class="buttonGerarPDF" href="{{route('gerarPDF')}}">Gerar PDF da Semana</a>
        </div>
    </nav>


    <div>
        @hasSection ('content')
            @yield ('content')
        @endif
    </div>
</body>

</html>