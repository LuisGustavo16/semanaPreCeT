<?php
$data = new DateTime($dados->dia);
$dataNova = new DateTime($dados->dia);
$dataNova = $dataNova->format('d/m/Y');

// Obtenha o dia da semana em inglês
$diaDaSemanaIngles = $data->format('l');

// Array de tradução
$diasDaSemana = [
    'Sunday' => 'Domingo',
    'Monday' => 'Segunda-feira',
    'Tuesday' => 'Terça-feira',
    'Wednesday' => 'Quarta-feira',
    'Thursday' => 'Quinta-feira',
    'Friday' => 'Sexta-feira',
    'Saturday' => 'Sábado'
];
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class="divNoticiaEscolhida">
        <h1 class="tituloEscolhido">{{$dados->titulo}}</h1>
        <h6>{{$diasDaSemana[$diaDaSemanaIngles]}}, {{$dataNova}}</h6>
        @foreach(explode("\n", $dados->noticia) as $paragrafo)
            <h2 class="conteudoEscolhido">{{ $paragrafo }}</h2>
        @endforeach
    </div>
</div>
@endsection