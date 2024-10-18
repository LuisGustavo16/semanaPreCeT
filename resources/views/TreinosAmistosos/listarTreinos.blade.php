<?php
$aux = false;
$classe = 'branco';
$notificacao = true;
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form class="formularioTreinoEscondido" action="/treino_amistosos/apagarVarios" method="post">
        @csrf
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
            <caption>TREINOS & AMISTOSOS</caption>
            <thead>
                <tr class="amarelo">
                    <th>Modalidade</th>
                    <th>Dia</th>
                    <th>Horário</th>
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
                                    <td>{{$item->nomeModalidade}} {{$item->genero}}</td>
                                    <td>{{$item->dia}}</td>
                                    <td>{{$item->horario}}</td>
                                    <td>
                                        <a class="linkIcone" href="../treino_amistosos/verTreino/{{$item->idTreino}}">
                                            <img class="icone verMais" src="/storage/imagens/verMais.png" alt="verMais">
                                        </a>
                                        <a class="linkIcone" href="../treino_amistosos/editar/{{$item->idTreino}}">
                                            <img class="icone" src="/storage/imagens/editar.png" alt="editar">
                                        </a>
                                        <a class="linkIcone" href="../treino_amistosos/apagar/{{$item->idTreino}}"
                                            onclick="return confirm('Deseja apagar o treino do dia {{$item->dia}} ?')">
                                            <img class="icone apagar" src="/storage/imagens/apagar.png" alt="apagar">
                                        </a>
                                        <input type="checkbox" name="treino[]" value="{{$item->idTreino}}">
                                    </td>
                                </tr>

                @endforeach
            </tbody>
        </table>
        <button type="submit">Apagador selecionados</button>
    </form>

</div>
@endsection