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
<style>
    .apagarTreinosAntigos {
        text-decoration: none;
        color: black;
        font-size: 1.5rem;
        font-weight: 700;
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
    }

    .apagarTreinosAntigos:hover {
        color: brown;
    }
</style>
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
                                            <img class="icone verMais" src="/storage/assets/ver.png" alt="verMais">
                                        </a>
                                        <a class="linkIcone" href="../treino_amistosos/editar/{{$item->idTreino}}">
                                            <img class="icone" src="/storage/assets/editar.png" alt="editar">
                                        </a>
                                        <a class="linkIcone" href="../treino_amistosos/apagar/{{$item->idTreino}}"
                                            onclick="return confirm('Deseja apagar o treino do dia {{$item->dia}}?')">
                                            <img class="icone apagar" src="/storage/assets/apagar.png" alt="apagar">
                                        </a>
                                    </td>
                                </tr>

                @endforeach
            </tbody>
        </table>
        <div>
            <div class="divCentralizaBotaoApagarTreinos">
                <button class="botaoApagarSelecionados" type="submit">Apagar selecionados</buttonc>
            </div>
            <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                <a class="apagarTreinosAntigos" onclick="return confirm('Deseja apagar todos os treinos antigos?')"
                    href="{{route('apagarTreinosAntigos')}}">Apagar treinos antigos</a>
            </div>

        </div>

    </form>

</div>
@endsection