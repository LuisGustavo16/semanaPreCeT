<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modalCheckins">
        @foreach ($dados as $treino)
                @if ($treino->status == "realizado")
                    <div class="cardTreino">
                        <h1>Dia: {{$treino->dia}} ({{$treino->horarioInicio}} -  {{$treino->horarioFim}})</h1>
                        <h2>Local: {{$treino->local}}</h2>
                        <h3>Atividade: {{$treino->nomeModalidade}} {{$treino->genero}}</h3>
                        <a href="/alunos/cancelarCheckin/{{$idAluno}}/{{$treino->idTreino}}">Cancelar checkin</a>
                    </div>
                @else
                    <div class="cardTreino">
                        <h1>Dia: {{$treino->dia}} ({{$treino->horarioInicio}} -  {{$treino->horarioFim}})</h1>
                        <h2>Local: {{$treino->local}}</h2>
                        <h3>Atividade: {{$treino->nomeModalidade}} {{$treino->genero}}</h3>
                        <a href="/alunos/realizarCheckin/{{$idAluno}}/{{$treino->idTreino}}">Realizar checkin</a>
                    </div>
                @endif
            @endforeach
    </div>
</body>

</html>