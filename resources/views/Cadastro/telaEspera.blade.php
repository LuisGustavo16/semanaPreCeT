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

@extends ('cabecalho2')
@section('content')
<body>
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
@endsection

</html>