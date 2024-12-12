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
<div class="divNotificacao" style="display: flex;">
    @if(session('status') == 'danger')
        <div class="danger">
            {{ session('message') }}
            <a onclick="statusNotificacao()" href="#" class="apagarNotificacao">X</a>
        </div>
    @elseif(session('status') == 'success')
        <div class="success">
            {{ session('message') }}
            <a onclick="statusNotificacao()" href="#" class="apagarNotificacao">X</a>
        </div>
    @endif
</div>
<div class="fundo">
    <table>
        @if ($status == 'A')
            <caption>Reservas</caption>
        @else
            <caption>Solicitações de Reservas</caption>
        @endif

        <thead>
            <tr class="amarelo">
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
                            <td>{{$item->dia}}</td>
                            <td>{{$item->horarioInicio}} - {{$item->horarioFim}}</td>
                            <td>{{$item->local}}</td>
                            <td><a href="../../reservas/reservaEscolhida/{{$item->idReserva}}"><img
                                        src="{{asset('storage/assets/ver.png')}}" alt="" style="width: 40px; height: 40px;"></a>
                            </td>
                        </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection