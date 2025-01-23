<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE Varginha</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
            flex: 1;
        }

        footer {
            background-color: #f4f4f4;
            color: #555;
            text-align: center;
            bottom: 0;
            width: 100%;
        }

        .autores {
            max-width: 40%;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        .time {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            justify-items: center;
            margin-top: 30px;
        }

        .time img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            max-width: 150px;
        }

        .time .membro {
            text-align: center;
        }

        .time .membro p {
            margin-top: 5px;
        }



        .menu {
            display: flex;
            padding: 10px;
        }

        .menu a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        .menu a:hover {
            text-decoration: underline;
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
            <a class="linkCadastro" href="{{route('entrarAluno')}}">Entrar como estudante</a>
            <a class="linkCadastro" href="/login">Entrar como administrador</a>
            <a class="linkCadastro" href="/CadastroInicial">Se registrar</a>
            <a href="https://www.varginha.cefetmg.br/wp-content/uploads/sites/11/2024/11/resolucao_dcvg-4-ginasio.pdf"
                target="_blank">Regulamento</a>
            <a class="buttonGerarPDF" href="{{route('gerarPDF')}}">Gerar PDF da Semana</a>
        </div>
    </nav>

    <div class="container">
        <h2>Sobre o Projeto</h2>
        <p>O SIGEE é uma ferramenta para facilitar o gerenciamento de atividades esportivas, permitindo:</p>
        <ul>
            <li>Reservar quadras e ginásios;</li>
            <li>Acessar cronogramas semanais;</li>
            <li>Visualizar e baixar documentos relevantes;</li>
            <li>Fazer check-in nos treinos;</li>
            <li>Visualizar os times do campus;</li>
            <li>Facilitar a comunicação entre a professora e os alunos;</li>
            <li>Gerenciar atividades.</li>
        </ul>

        <div class="time">
            <div class="membro">
                <img src="leticia.jpg" alt="Letícia">
                <p>Letícia Brito Oliveira</p>
            </div>
            <div class="membro">
                <img src="luis.jpg" alt="Luis">
                <p>Luis Gustavo Pereira de Souza</p>
            </div>
            <div class="membro">
                <img src="gabi.jpg" alt="Gabi">
                <p>Gabriela Arantes</p>
            </div>
            <div class="membro">
                <img src="marcelo.jpg" alt="Marcelo">
                <p>Marcelo Mussel</p>
            </div>
            <div class="membro">
                <img src="lazaro.jpg" alt="Lázaro">
                <p>Lázaro Eduardo</p>
            </div>
        </div>

        <p><strong>Autores: Desenvolvido pelos alunos Letícia Brito Oliveira e Luis Gustavo Pereira de Souza, com os
                orientadores Marcelo Mussel e Lázaro Eduardo, e a coorientadora Gabriela Arantes.</strong></p>
    </div>

    <div class="premiacao">
        <img src="/storage/assets/cet.jpeg" alt="Premiação do SIGEE">
        <p>Premiação pela inovação no projeto</p>
    </div>

    <footer>
        <p>&copy; 2025 SIGEE Varginha - Todos os direitos reservados.</p>
    </footer>
</body>

</html>