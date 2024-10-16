<?php
    $popup = true;
    $op;
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
        @csrf
        <div class="tabela">
            <div class="divListar solicitacao">
                <div class="campoListarTreinoEscolhido">
                    <h1 class="textoSolicitacao">Aluno:</h1>
                    <h2>{{$aluno->nome}} / {{$aluno->turma}} {{$aluno->curso}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1 class="textoSolicitacao">Dia:</h1>
                    <h2>{{$dados->dia}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1 class="textoSolicitacao">Local:</h1>
                    <h2>{{$dados->local}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1 class="textoSolicitacao">Horário de Inicio:</h1>
                    <h2>{{$dados->horarioInicio}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1 class="textoSolicitacao">Horário de Inicio:</h1>
                    <h2>{{$dados->horarioInicio}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1 class="textoSolicitacao">Finalidade:</h1>
                    <h2>{{$dados->finalidade}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido pessoas">
                    <h1 class="textoSolicitacao">Número estimado de pessoas:</h1>
                    <h2>12</h2>
                </div>
            </div>
            <div class="centralizarBotoes ">
                @if ($dados->status == 'A')
                    <a class="cancelar" href="/reservas/apagar/{{$dados->idReserva}}/A">Cancelar reserva</a>
                @else
                    <a onclick="togglePopup(false, 'rejeitar')" class="recusar" href="#">Rejeitar</a>
                    <a onclick="togglePopup(false, 'aceitar')" class="aceitar" href="#">Aceitar</a>
                    <div id="observacaoPopup" style="display: none;">
                        <h1>Observação:</h1>
                        <textarea class="inputPopup" name="observacao" id=""></textarea>
                        <a onclick="togglePopup(true, 'rejeitar')" class="cancelarPopup" href="#">Cancelar</a>
                        <a class="aceitarPopup" href="#">Enviar</a>
                    </div>
                @endif
            </div>
    </form>
</div>

@endsection

<script>
    function togglePopup(show, opcao) {
        const popup = document.getElementById('observacaoPopup');
        const overlay = document.getElementById('overlay')
        popup.style.display = show ? 'none' : 'grid';
        overlay.style.display = show ? 'none' : 'block';
        op = opcao;
    }
</script>