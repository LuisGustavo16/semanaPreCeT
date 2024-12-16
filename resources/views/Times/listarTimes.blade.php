<?php
$aux = false;
$classe = 'branco';
?>
<script>
    function statusNotificacao() {
        const notificacao = document.getElementsByClassName("divNotificacao")[0];
        notificacao.style.display = 'none';
    }
</script>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form class="formularioTreinoEscondido" action="/times/apagarVarios" method="post">
        @csrf
        <div class="divNotificacao" style="display: flex;">
            @if(session()->get('danger'))
                <div class="danger">
                    {{ session()->get('danger') }}
                    <a onclick="statusNotificacao()" href="#" class="apagarNotificacao">X</a>
                </div>
            @elseif (session()->get('success'))
                <div class="success">
                    {{ session()->get('success') }}
                    <a onclick="statusNotificacao()" href="#" class="apagarNotificacao">X</a>
                </div>
            @endif
        </div>
        <table>
            <caption>TIMES</caption>
            <thead>
                <tr class="amarelo">
                    <th>Selecionar</th>
                    <th>Modalidade</th>
                    <th>Competição</th>
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
                                    <td>
                                        <input class="checkboxTimes" type="checkbox" name="times[]" value="{{$item->idTime}}">
                                    </td>
                                    <td>{{$item->nomeModalidade}} {{$item->genero}}</td>
                                    <td>{{$item->competicao}}</td>
                                    <td>
                                        <a class="linkIcone" href="../times/editar/{{$item->idTime}}">
                                            <img class="icone" src="/storage/assets/editar.png" alt="editar">
                                        </a>
                                        <a class="linkIcone" href="../times/verTime/{{$item->idTime}}">
                                            <img class="icone verMais" src="/storage/assets/ver.png" alt="verMais">
                                        </a>
                                        <a class="linkIcone" href="../times/apagar/{{$item->idTime}}"
                                            onclick="return confirm('Deseja apagar o time do {{$item->competicao}} ?')">
                                            <img class="icone apagar" src="/storage/assets/apagar.png" alt="apagar">
                                        </a>
                                    </td>
                                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="divCentralizaBotaoApagarTreinos">
            <button class="botaoApagarSelecionados" type="submit">Apagar selecionados</button>
        </div>
    </form>
</div>
@endsection