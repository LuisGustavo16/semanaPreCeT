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

/*formulário*/
.container {
    display: block;              
    height: 100vh; 
}


.titulo {
    font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
    text-align: center;
}

.desc {
    font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
    font-size: larger;
    text-align: center;
    padding: 0rem;
    font-weight: normal;
}

.sigee {
    font-family: Blippo, fantasy;
    font-size: 350%;
    text-align: center;
}

.fundoCadastrarAluno {
    width: 100%;
    justify-content: center;
    align-items: center;
}

.formRegistroInicio {
    box-shadow:  2px 2px 5px black;
    padding: 3rem;
    padding-top: 0;
    border: 1px solid black;
    display: flex;
    flex-direction: column;
    height: auto;                     
    width: 60%;                      
    margin: 0 auto;
}

.formRegistroAluno {
    box-shadow:  2px 2px 5px black;
    padding: 3rem;
    padding-top: 0;
    border: 1px solid black;
    display: flex;
    flex-direction: column;
    height: auto;                     
    width: 40%;                      
    max-width: 70rem;                
    margin: 0 auto;
}


.colunaFormAluno {
    width: 90%;
    padding-top: 3rem;
}

.linhaFormUniversitario{
    display: grid;<header>
        <img src="leticia.jpg" alt="logo">
        <h1>SIGEE Varginha</h1>
        <p>Bem-vindo ao Sistema de Gerenciamento Esportivo Escolar</p>
    </header>
    grid-template-columns: repeat(1, 25rem);
    grid-template-rows: repeat(1, 8rem);
    gap: 20px;
}

.linhaFormAlunoEmail{
    display: grid;
    grid-template-columns: repeat(3, 25rem);
    grid-template-rows: repeat(1, 8rem);
    gap: 20px;
}

.labelTipoUser {
    padding-top: 3rem;
}
.inputNome, .inputCurso, .inputEmail {
    width: 100%;
}

.divSenhas {
    display: flex;
    gap: 20px;
}


.inputSenha {
    margin-left: 0;
}

.botaoFormAluno {
    height: 3rem;
    width: 10rem;
    padding-left: 2rem;
    padding-right: 2rem;
    border-radius: 5px;
    background-color: var(--blue);
    color: white;
    font-size: 130%;
    font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
    font-weight: bold;
    cursor: pointer;
}

select {
    padding-left: 0.5rem;
    font-size: 1.1rem;
    height: 3rem;
    width: 100%;
    font-family: "Inter", sans-serif;
}
form {
            border-radius: 2rem;
            box-shadow: 0.1rem 0.1rem 1rem black;
            margin: 5rem;
            margin-top: 3rem;
            padding: 3rem;
            padding-top: 0;
            background-color: white;
            border: 3px solid black;
            display: flex;
            height: 28rem;
            width: 70rem;
        }

        div.coluna {
            width: 20rem;
            row-gap: 5rem;
        }

        .campo {
            padding-top: 3rem;
        }

        label {
            font-size: 1.3rem;
            font-weight: 400;
            text-decoration: dashed;
        }

        input {
            padding-left: 0.5rem;
            font-size: 1.1rem;
            height: 2rem;
            font-family: "Inter", sans-serif;
            width: 90%;
        }

        .matricula {
            width: 60%;
        }

        /*BOTÃO*/
        button.botao {
            position: relative;
            height: 2rem;
            width: 10rem;
            border-radius: 2rem;
            background-color: var(--blue);
            color: white;
            font-size: 1.2rem;
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            border: 0;
            cursor: pointer;
            bottom: -27rem;
            margin-left: 5rem;
        }

        button.botao:hover {
            box-shadow: 0.1rem 0.1rem 1rem black;
            font-weight: 700;
        }

         /* Responsividade */

        @media (max-width: 1200px) {
            .linhaFormAluno {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 1670px) {
            .linhaFormAluno {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            #nome {
                grid-template-columns: repeat(1, 25rem);
                grid-template-rows: repeat(2, 7rem);
            }

            #nome2 {

                grid-template-columns: repeat(1, 25rem);
                grid-template-rows: repeat(2, 7rem);
            }
        }


        @media (max-width: 768px) {
            .linhaFormAluno {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .formRegistroAluno {
                width: 50%;
                max-width: 100%;
                padding: 2rem;
            }

            .botaoFormAluno {
                max-width: 100%;
                padding-left: 2rem;
                padding-right: 2rem;
                font-size: 120%;
            }

            .inputNome,
            .inputEmail,
            .inputCurso {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .sigee {
                font-size: 250%;
            }

            .titulo {
                font-size: 1.5rem;
            }

            .desc {
                font-size: 1rem;
            }

            .campo label {
                font-size: 0.9rem;
            }

            .formRegistroAluno {
                padding: 1rem;
            }

            .botaoFormAluno {
                font-size: 110%;
            }
        }
    </style>
</head>

@extends ('cabecalho2')
@section('content')
<body class="container">
<div>
        <div>
        <h1 class="titulo">Crie seu cadastro</h1>
        <h3 class="desc">Para acessar o aplicativo SIGEE, é necessáio preencher corretamente o formulário abaixo.
            Os campos * são de preenchimeno obrigatório.</h3>
    </div>

    <div class="fundoCadastrarAluno">

        <form class="formRegistroAluno" action="/cadastro/registrarUniversitario" method="POST">
            @csrf
            <div class='linhaFormUniversitario'>
                <div style="display: none;">
                    <input type="text" name="name" value="{{$user['name']}}">
                    <input type="text" name="email" value="{{$user['email']}}">
                    <input type="text" name="password" value="{{$user['password']}}">
                </div>
                <div class="campo" id="campo-cursoGraduação">
                    <label for="curso">*Curso:</label><br>
                    <select style="width: 70%" name="curso" required>
                        <option value="Sistemas de Informação">Sistemas de Informação</option>
                        <option value="Engenharia Civil">Engenharia Civil</option>
                    </select>
                </div>
                <div class="campo">
                    <label  for="matricula">*Matrícula:</label><br>
                    <input class="matricula" type="text" name="matricula" required>
                </div>

            </div>
    </div>

    </div>
    <div style="display: flex; width: 100%; align-itens: center; justify-content: center; margin-top: 2rem">
        <button class="botaoFormAluno" type="submit">Registrar</button>
    </div>
    </form>
    </div>

</body>
@endsection
</html>