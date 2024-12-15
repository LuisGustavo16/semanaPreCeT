<?php
$j = 0;
$aux = 1;

if (!function_exists('confereDia')) {
    /*Caso tenha dias iguais, une as células*/
    function confereDia($data, $atvConefrir, $posicaoAtual)
    {
        $qtdLinhas = 0;
        for ($i = 0; $i < count($atvConefrir); $i++) {
            if (($posicaoAtual + $i) < (count($atvConefrir))) {
                $item = $atvConefrir[$posicaoAtual + $i];
                $diaAtv = str($item['dia']);
                if (($data) == ($diaAtv)) {
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

        .caption {
            font-family: "Inter", sans-serif;
            color: black;
            word-spacing: 20px;
            text-shadow: 0 0 0 black;
            padding-top: 1rem;
            padding-bottom: 1rem;
            font-size: 1.8rem;
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

        .centralizarCronograma {
            width: 100%;
            display: grid;
        }

        .subtitulo {
            font-family: "Inter", sans-serif;
            font-size: 1.5rem;
        }

    </style>
</head>

<body>
    <div class="centralizarCrnograma">
        <div class="informacoes">
            <h1 class="caption">Programção Esportiva {{$inicioSemana}} - {{$fimSemana}}</h1>
            <h1 class="subtitulo">CEFET-MG Campus Varginha</h1>
        </div>
        <table class="tabelaCronograma">
            <thead>
                <th class="thCronograma">Data</th>
                <th class="thCronograma">Atividade</th>
                <th class="thCronograma">Horário</th>
                <th class="thCronograma">Modalidade</th>
                <th class="thCronograma">Local</th>
                <th class="thCronograma">Gênero/Time</th>
                <th class="thCronograma">Público</th>
                <th class="thCronograma">Responsável</th>
            </thead>
            <tbody>
                @foreach ($atividades as $item)
                    <tr>
                        @if ($aux == 1)
                            <?php        $aux = confereDia($item['dia'], $atividades, $j)?>
                            <td class="tdCronograma" rowspan="{{confereDia($item['dia'], $atividades, $j)}}">{{$item['dia']}}
                            </td>
                        @else
                            <?php        $aux--; ?>
                        @endif
                        <td class="tdCronograma">{{$item['tipo']}}</td>
                        <td class="tdCronograma">{{$item['horarioInicio']}} - {{$item['horarioFim']}}</td>
                        <td class="tdCronograma">{{$item['modalidade']}}</td>
                        <td class="tdCronograma">{{$item['local']}}</td>
                        @if ($item['tipo'] == 'Treino')
                            <td class="tdCronograma">{{$item['genero']}}</td>
                            <td class="tdCronograma">{{$item['publico']}}</td>
                            <td class="tdCronograma">{{$item['responsavel']}}</td>
                        @else
                            <td class="tdCronograma">{{$item['time']}}</td>
                            <td class="tdCronograma">---</td>
                            <td class="tdCronograma">---</td>
                        @endif
                    </tr>
                    <?php    $j++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>