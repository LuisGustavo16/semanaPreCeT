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
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div>
        <table class="tabelaCronograma">
            <caption class="dataSemana">{{$inicioSemana}} - {{$fimSemana}}</caption>
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
        <div class="centralizarBotao">
            <a class="buttonGerarPDF" href="{{route("gerarPDF")}}">GERAR PDF</a>
        </div>
    </div>
</div>
@endsection