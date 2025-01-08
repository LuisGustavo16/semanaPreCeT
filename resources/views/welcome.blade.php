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
            width: 100px; /* ajustar o tamanho da logo*/
            vertical-align: middle;
            margin-right: 10px;
        }
        nav {
            background-color: #003366;
            display: flex;
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
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        autores {
            max-width: 40%; 
            margin: 0 auto; 
            padding: 20px; 
            
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
       <!-- Colocar logo -->
        <h1>SIGEE Varginha</h1>
        <p>Bem-vindo ao Sistema de Gerenciamento Esportivo Escolar</p>
    </header>

    <nav>
        <a class="linkCadastro" href="{{route('entrarAluno')}}">Entrar como estudante</a>
        <a class="linkCadastro" href="/login">Entrar como administrador</a>
        <a class="linkCadastro" href="/CadastroInicial">Se registrar</a>
        <a href="https://www.varginha.cefetmg.br/wp-content/uploads/sites/11/2024/11/resolucao_dcvg-4-ginasio.pdf" target="_blank">Regulamento</a>
        <a class="buttonGerarPDF" href="{{route('gerarPDF')}}">Gerar PDF da Semana</a>
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
        <div class="autores"></div>
        
        <p><strong>Autores: Desenvolvido pelos alunos Letícia Brito Oliveira e Luis Gustavo Pereira de Souza, com os orientadores Marcelo Mussel e Lázaro Eduardo, e a coorientadora Gabriela Arantes.</strong></p>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 SIGEE Varginha - Todos os direitos reservados.</p>
    </footer>
</body>
</html>