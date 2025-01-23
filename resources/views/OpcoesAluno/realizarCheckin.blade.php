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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .modalCheckins {
            padding: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: space-around;
        }

        .cardTreino {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease-in-out;
            flex: 1 1 30%;
            box-sizing: border-box;
            min-width: 250px;
        }

        .cardTreino:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        .cardTreino h1,
        .cardTreino h2,
        .cardTreino h3 {
            font-weight: 800;
        }

        .cardTreino h1 {
            font-size: 22px;
            color: black;
        }

        .cardTreino h2 {
            font-size: 20px;
            color: gray;
        }

        .cardTreino h3 {
            font-size: 18px;
            color: gray;
        }

        .cardTreino a {
            display: inline-block;
            margin-top: 10px;
            font-size: 17px;
            font-weight: bold;
            text-decoration: none;
        }

        .cardTreino a:hover {
            text-decoration: underline;
        }

        .cancelarCheckin {
            color: red;
        }

        .realizarCheckin {
            color: green;
        }

        h2 {
            width: 100%;
            text-align: center;
            height: 10px;
            font-size: 2rem;
            font-weight: 800;
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            text-decoration: dashed;
        }

        .opcao {
            display: flex;
        }

        .icone {
            width: 40px;
        }

        .divIcone {
            display: block;
            justify-content: right;
        }
    </style>
</head>
@extends ('cabecalho3')
@section('content')

<body>
    <h2>Fazer checkin</h2>
    <div class="modalCheckins">
        @foreach ($dados as $treino)
            @if ($treino->status == "realizado")
                <div class="cardTreino">
                    <h1>Dia: {{$treino->dia}} ({{$treino->horarioInicio}} - {{$treino->horarioFim}})</h1>
                    <h3>Local: {{$treino->local}}</h3>
                    <h3>Atividade: {{$treino->nomeModalidade}} {{$treino->genero}}</h3>
                    @if ($treino->observacao != null)
                        <div style="width: 100%">
                            <h3>Observação: {{$treino->observacao}}</h3>
                        </div>
                    @endif
                    <div class="opcao">
                        <a class="cancelarCheckin" href="/alunos/cancelarCheckin/{{$idAluno}}/{{$treino->idTreino}}">Cancelar
                            checkin</a>
                        <div style="display: flex; align-items: right; justify-content: right; width: 100%">
                            <div class="divIcone">
                                <img class="icone" src="/storage/assets/pessoa.png" alt="lotacao">
                                <h3>{{$treino->vagasOcupadas}} / {{$treino->numeroMaximoParticipantes}}</h3>
                            </div>
                        </div>

                    </div>


                </div>
            @elseif ($treino->numeroMaximoParticipantes == $treino->vagasOcupadas)
                <div class="cardTreino">
                    <h1>Dia: {{$treino->dia}} ({{$treino->horarioInicio}} - {{$treino->horarioFim}})</h1>
                    <h3>Local: {{$treino->local}}</h3>
                    <h3>Atividade: {{$treino->nomeModalidade}} {{$treino->genero}}</h3>
                    @if ($treino->observacao != null)
                        <div style="width: 100%">
                            <h3>Observação: {{$treino->observacao}}</h3>
                        </div>
                    @endif
                    <a style="color: gray; text-decoration: none" class="realizarCheckin">Treino lotado</a>
                </div>
            @else
                <div class="cardTreino">
                    <h1>Dia: {{$treino->dia}} ({{$treino->horarioInicio}} - {{$treino->horarioFim}})</h1>
                    <h3>Local: {{$treino->local}}</h3>
                    <h3>Atividade: {{$treino->nomeModalidade}} {{$treino->genero}}</h3>
                    @if ($treino->observacao != null)
                        <div style="width: 100%">
                            <h3>Observação: {{$treino->observacao}}</h3>
                        </div>
                    @endif
                    <div class="opcao">
                        <a class="realizarCheckin" href="/alunos/realizarCheckin/{{$idAluno}}/{{$treino->idTreino}}">Realizar
                            checkin</a>
                        <div style="display: flex; align-items: right; justify-content: right; width: 100%">
                            <div class="divIcone">
                                <img class="icone" src="/storage/assets/pessoa.png" alt="lotacao">
                                <h3>{{$treino->vagasOcupadas}} / {{$treino->numeroMaximoParticipantes}}</h3>
                            </div>
                        </div>

                    </div>

                </div>
            @endif
        @endforeach
    </div>
</body>
@endsection

</html>