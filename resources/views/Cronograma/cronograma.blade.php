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
@extends ('cabecalho')
@section('content')
<div class="fundo">

    <table class="tabelaCronograma">
        <caption class="dataSemana">{{$inicioSemana}} - {{$fimSemana}}</caption>
        <thead>
            <th class="thCronograma">Data</th>
            <th class="thCronograma">Horário</th>
            <th class="thCronograma">Modalidade</th>
            <th class="thCronograma">Gênero</th>
            <th class="thCronograma">Público</th>
            <th class="thCronograma">Local</th>
            <th class="thCronograma">Responsável</th>
        </thead>
        <tbody>
            @foreach ($treinos as $treino)
                @foreach ($modalidades as $modalidade)
                    @if ($modalidade->idModalidade == $treino->idModalidade)
                        <tr>
                            @if ($aux == 1)
                                <?php $aux = confereDia($treino->dia, $treinos, $j)?>
                                <td class="tdCronograma" rowspan="{{confereDia($treino->dia, $treinos, $j)}}">{{$treino->dia}}</td>
                            @else
                                <?php $aux--; ?>
                            @endif
                            <td class="tdCronograma">{{$treino->horario}}</td>
                            <td class="tdCronograma">{{$modalidade->nome}}</td>
                            <td class="tdCronograma">{{$treino->genero}}</td>
                            <td class="tdCronograma">{{$treino->publico}}</td>
                            <td class="tdCronograma">{{$treino->local}}</td>
                            <td class="tdCronograma">{{$treino->responsavel}}</td>
                        </tr>
                        <?php $j++; ?>
                    @endif
                @endforeach
            @endforeach

        </tbody>
    </table>
    <a class="buttonGerarPDF" href="{{route("gerarPDF")}}">GERAR PDF</a>
</div>
@endsection