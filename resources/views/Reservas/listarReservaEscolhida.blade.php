<?php
$popup = true;
?>
@extends ('cabecalho')
@section('content')
<style>
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
    }
</style>
<div id="overlay" style="display: none;"></div>
<div class="divReservaEscolhida">
    <div>
        <div class="divListar solicitacao">
            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Aluno:</h1>
                <h2>{{$aluno->name}} / {{$aluno->turma}} {{$aluno->curso}}</h2>
            </div>

            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Dia:</h1>
                <h2>{{$dados->dia}} [{{$dados->diaSemana}}]</h2>
            </div>

            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Local:</h1>
                <h2>{{$dados->local}}</h2>
            </div>

            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Horário de Inicio:</h1>
                <h2>{{$dados->horarioInicio}}</h2>
            </div>

            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Horário de Finalização:</h1>
                <h2>{{$dados->horarioFim}}</h2>
            </div>

            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Finalidade:</h1>
                <h2>{{$dados->finalidade}}</h2>
            </div>

            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Número estimado de pessoas:</h1>
                <h2>{{$dados->numeroPessoas}}</h2>
            </div>

            <div class="campoListarReservaEscolhida">
                <h1 class="textoSolicitacao">Tipo:</h1>
                <h2>{{$dados->tipo}}</h2>
            </div>

            @if ($dados->status == 'A')
                <div class="campoListarReservaEscolhida">
                    <h1 class="textoSolicitacao">Observação</h1>
                    <h2>{{$dados->observacao}}</h2>
                </div>
            @endif

            @if ($dados->tipo == 'regular')
                <div class="campoListarReservaEscolhida">
                    <h1 class="textoSolicitacao">Dia de cancelamento:</h1>
                    @if ($dados->diaCancelamento != null)
                        <h2>{{$dados->diaCancelamento}}</h2>
                    @endif
                </div>
            @endif

        </div>
        <div class="centralizarBotoes ">
            @if ($dados->status == 'A')
                @if ($dados->tipo == 'regular')
                    <a onclick="togglePopup(false, 'rejeitar')" class="cancelar" href="#">Cancelar reserva permanentemente</a>
                    <a onclick="togglePopup(false, 'cancelarDia')" class="cancelar" href="#">Cancelar reserva apenas em um
                        dia</a>
                @else
                    <a onclick="togglePopup(false, 'rejeitar')" class="cancelar" href="#">Cancelar reserva</a>
                @endif
            @else
                <a onclick="togglePopup(false, 'rejeitar')" class="recusar" href="#">Rejeitar</a>
                <a onclick="togglePopup(false, 'aceitar')" class="aceitar" href="#">Aceitar</a>
            @endif

            <div id="observacaoPopupRejeitar" style="display: none;">
                <form method="post" class="formularioEscondido" action="/reservas/apagar/{{$dados->idReserva}}/P">
                    @csrf
                    <h1 id="textoPopup">Observação:</h1>
                    <textarea class="inputPopup" name="observacao" id=""></textarea>
                    <a onclick="togglePopup(true, 'rejeitar')" class="cancelarPopup" href="#">Cancelar</a>
                    <button type="submit" class="aceitarPopup" href="#">Enviar</button>
                </form>
            </div>

            <div id="observacaoPopupAceitar" style="display: none;">
                <form method="post" class="formularioEscondido"
                    action="/reservas/aceitarReserva/{{$dados->idReserva}}/P">
                    @csrf
                    <h1 id="textoPopup">Observação:</h1>
                    <textarea class="inputPopup" name="observacao" id=""></textarea>

                    <a onclick="togglePopup(true, 'aceitar')" class="cancelarPopup" href="#">Cancelar</a>
                    <button type="submit" class="aceitarPopup" href="#">Enviar</button>
                </form>
            </div>

            <div id="observacaoPopupCancelarDia" style="display: none;">
                <form method="post" class="formularioEscondido"
                    action="/reservas/cancelarRegular/{{$dados->idReserva}}">
                    @csrf
                    <h1 id="textoPopup">Observação:</h1>
                    <textarea class="inputPopup" name="observacao" id=""></textarea>
                    <h1 id="textoPopupData">Data do caneclamento:</h1>
                    <input class="diaCancelamento" type="date" name="diaCancelamento">
                    <a onclick="togglePopup(true, 'cancelarDia')" class="cancelarPopup" href="#">Cancelar</a>
                    <button type="submit" class="aceitarPopup" href="#">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    @endsection

    <script>
        function togglePopup(show, opcao) {
            let popup;
            if (opcao == "aceitar") {
                popup = document.getElementById('observacaoPopupAceitar');
            } else if (opcao == "rejeitar") {
                popup = document.getElementById('observacaoPopupRejeitar');
            } else if (opcao == "cancelarDia") {
                popup = document.getElementById('observacaoPopupCancelarDia');
            }
            const overlay = document.getElementById('overlay')
            popup.style.display = show ? 'none' : 'grid';
            overlay.style.display = show ? 'none' : 'block';
        }
    </script>