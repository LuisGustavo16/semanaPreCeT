<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            align-items: center;
            width: 100%;
        }

        table thead tr th,
        table tr td {
            border: 0.12rem solid black;
        }

        table {
            border-collapse: collapse;
            height: 40rem;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding-left: 10px;
        }

        h1 {
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            font-size: 2rem;
        }

        h2 {
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            font-size: 1.5rem;
        }

        h5 {
            font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
            font-size: 1rem;
        }
    </style>
</head>

<body class="container">
    <h1>Lista de Presença</h1>
    <h1>Treino - {{$treino->modalidade}} {{$treino->genero}}</h1>
    <h2>Dia: {{$treino->dia}} ({{$treino->horarioInicio}} - {{$treino->horarioInicio}})</h2>
    <h5>{{$info}}</h5>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Turma</th>
                <th>Presença</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->turma}} {{$item->curso}}</td>
                    <td>{{$item->situacao}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>