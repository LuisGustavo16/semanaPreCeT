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
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Avantgardef", TeX Gyre Adventor, URW Gothic L, sans-serif;
            box-sizing: border-box;

            align-items: center;
            justify-content: center;
        }
         /* cabeçalho */
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

        /*tela espera*/
.modal {
    display: grid;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: -10;
}

.modal-content {
    background-color: #fff;
    padding: 6rem;
    border-radius: 8px;
    max-width: 600px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20rem;
}

.msg {
    font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
    font-size: 1.2rem;
    margin-bottom: 2rem;
}

.contato {
    font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
    font-size: 1.2rem;
}

.contact-info {
    margin-top: 2rem;
    font-size: 1rem;
    text-align: center;
}

.contact-info .label {
    font-weight: bold;
}

.contact-info .info {
    color: #333;
}

    </style>

</head>

<body>
<div>
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
                <a class="linkCadastro"
                    href="https://www.varginha.cefetmg.br/wp-content/uploads/sites/11/2024/11/resolucao_dcvg-4-ginasio.pdf"
                    target="_blank">Regulamento</a>
                <a class="linkCadastro" href="{{route('gerarPDF')}}">Gerar PDF da Semana</a>
            </div>
        </nav>
    </div>

    <div class="modal">
        <div class="modal-content">
            <h1 class="msg">Seu cadastro foi realizado com sucesso! <br> Espere a professora Gabriela avaliar seu
                registro para que você possa acessar o aplicativo...</h1>
            <hr>
            <div class="contact-info">
                <p class="contato">Informações de Contato</p>
                <p><span class="label">Email:</span> <span class="info">britotpleticia@gmail.com</span></p>
                <p><span class="label">Telefone:</span> <span class="info">(35) 98828-9379</span></p>
            </div>
        </div>
    </div>
</body>

</html>