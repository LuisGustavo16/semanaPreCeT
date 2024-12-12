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
            <caption>USUÁRIOS PENDENTES</caption>
            <thead>
                <tr class="amarelo">
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Matricula</th>
                    <th>Tipo</th>
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
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->turma}} {{$item->curso}}</td>
                                    <td>{{$item->matricula}}</td>
                                    <td>{{$item->tipo}}</td>
                                    <td>
                                        <a href="/alunos/aceitarNegarRegistro/{{$item->id}}/{{'aceitar'}}">Aceitar</a>
                                        <a href="/alunos/aceitarNegarRegistro/{{$item->id}}/{{'negar'}}">Negar</a>
                                    </td>
                                </tr>

                @endforeach
            </tbody>
        </table>
    </form>

</div>
@endsection
