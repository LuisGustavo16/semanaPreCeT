<?php
$j = 0;
$aux = 1;

if (!function_exists('confereDia')) {
    /*Caso tenha dias iguais, une as células*/
    function confereDia($data, $treinosConefrir, $posicaoAtual)
    {
        $qtdLinhas = 0;
        for ($i = 0; $i < count($treinosConefrir); $i++) {
            if (($posicaoAtual + $i) < (count($treinosConefrir))) {
                $treino = $treinosConefrir[$posicaoAtual + $i];
                $diaTreino = str($treino->dia);
                if (($data) == ($diaTreino)) {
                    $qtdLinhas++;
                }
            }
        }
        return $qtdLinhas;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        caption {
            font-family: "Inter", sans-serif;
            color: black;
            word-spacing: 20px;
            text-shadow: 0 0 0 black;
            border: 0.1rem solid black;
            border-bottom: 0;
            padding-top: 1rem;
            padding-bottom: 1rem;
            font-size: 2rem;
            font-weight: 700;
        }

        td {
            font-family: "Inter", sans-serif;
            border: 0.1rem solid black;
            background-color: var(--yellow);
        }

        th {
            font-family: "Inter", sans-serif;
            border: 0.1rem solid black;
            background-color: var(--yellow);
        }

        tr {
            height: 4rem;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin-top: 3rem;
            height: 10rem;
            width: 55rem;
            background-color: white;
            border: 1px solid black;
            margin-bottom: 3rem;
        }

        .fundo {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="fundo">

        <table>
            <thead>
                <th>Data</th>
                <th>Horário</th>
                <th>Modalidade</th>
                <th>Gênero</th>
                <th>Público</th>
                <th>Local</th>
                <th>Responsável</th>
            </thead>
            <tbody>
                @foreach ($treinos as $treino)
                    @foreach ($modalidades as $modalidade)
                        @if ($modalidade->idModalidade == $treino->idModalidade)
                            <tr>
                                @if ($aux == 1)
                                    <?php                $aux = confereDia($treino->dia, $treinos, $j)?>
                                    <td rowspan="{{confereDia($treino->dia, $treinos, $j)}}">{{$treino->dia}}</td>
                                @else
                                    <?php                $aux--; ?>
                                @endif
                                <td>{{$treino->horario}}</td>
                                <td>{{$modalidade->nome}}</td>
                                <td>{{$treino->genero}}</td>
                                <td>{{$treino->publico}}</td>
                                <td>{{$treino->local}}</td>
                                <td>{{$treino->responsavel}}</td>
                            </tr>
                            <?php            $j++; ?>
                        @endif
                    @endforeach
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>