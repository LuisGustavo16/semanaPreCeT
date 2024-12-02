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
    <form class="formularioTreinoEscondido" action="/treino_amistosos/apagarVarios" method="post">
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
            <caption>TREINOS & AMISTOSOS</caption>
            <thead>
                <tr class="amarelo">
                    <th>Modalidade</th>
                    <th>Dia</th>
                    <th>Horário</th>
                    <th>Vagas</th>
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
                                        <input class="checkboxTreinos" type="checkbox" name="treino[]" value="{{$item->idTreino}}">
                                        {{$item->nomeModalidade}} {{$item->genero}}
                                    </td>
                                    <td>{{$item->dia}}</td>
                                    <td>{{$item->horarioInicio}} - {{$item->horarioFim}}</td>
                                    <td>{{$item->vagasOcupadas}}/{{$item->numeroMaximoParticipantes}}</td>
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
                                    </td>
                                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="divCentralizaBotaoApagarTreinos">
            <button class="botaoApagarSelecionados" type="submit">Apagar selecionados</buttonc>

        </div>
    </form>

</div>
@endsection
