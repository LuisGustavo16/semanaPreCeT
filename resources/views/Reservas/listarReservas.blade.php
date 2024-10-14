<?php
    $aux = false;
    $classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
    <div class="fundo">
        <table>
            <caption>Reservas</caption>
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
                            <td><a href="../../reservas/reservaEscolhida/{{$item->idReserva}}">Ver</a></td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection