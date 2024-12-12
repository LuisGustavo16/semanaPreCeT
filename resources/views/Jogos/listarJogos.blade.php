<?php
$aux = false;
$classe = 'branco';
$notificacao = true;
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class="notificacao">
        @if ($notificacao)
            @if(session()->get('danger'))
                <div class="danger">
                    {{ session()->get('danger') }}
                    <a onclick="{{$notificacao = false}}" href="" class="apagarNotificacao">X</a>
                </div>
            @elseif (session()->get('success'))
                <div class="success">
                    {{ session()->get('success') }}
                    <a onclick="{{$notificacao = false}}" href="" class="apagarNotificacao">X</a>
                </div>
            @endif
        @endif
        
    </div>
    
    <table>
        <caption>JOGOS</caption>
        <thead>
            <tr class="amarelo">
                <th>Time</th>
                <th>Dia</th>
                <th>Horário</th>
                <th>Local</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                        <?php 
                                                        if ($aux == true) {
                    $classe = 'amarelo';
                    $aux = false;
                } elseif ($aux == false) {
                    $classe = 'branco';
                    $aux = true;
                }
                                                    ?>
                        <tr class="{{$classe}}">
                            <td>{{$item->nomeTime}}</td>
                            <td>{{$item->dia}}</td>
                            <td>{{$item->horario}}</td>
                            <td>{{$item->local}}</td>
                            <td>
                                <a class="linkIcone"  href="/jogos/editar/{{$item->idJogoTime}}">
                                    <img class="icone" src="/storage/assets/editar.png" alt="editar">
                                </a>
                                <a class="linkIcone" href="/jogos/selecionado/{{$item->idJogoTime}}">
                                    <img class="icone verMais" src="/storage/assets/ver.png" alt="verMais">
                                </a>
                                <a class="linkIcone" href="/jogos/apagar/{{$item->idJogoTime}}/{{$item->idTime}}"
                                    onclick="return confirm('Deseja apagar o jogo do dia {{$item->dia}} ?')">
                                    <img class="icone apagar" src="/storage/assets/apagar.png" alt="apagar">
                                </a>
                            </td>
                        </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection