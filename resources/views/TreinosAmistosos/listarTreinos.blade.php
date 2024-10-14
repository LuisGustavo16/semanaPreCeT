<?php
$aux = false;
$classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class="notificacao">
        @if(session()->get('danger'))
            <div class="danger">
                {{ session()->get('danger') }}
            </div>
        @elseif(session()->get('success'))
            <div class="success">
                {{ session()->get('success') }}
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
                                <a href="../treino_amistosos/verTreino/{{$item->idTreino}}">Ver</a>
                                <a href="../treino_amistosos/editar/{{$item->idTreino}}">Editar</a>
                                <a href="../treino_amistosos/apagar/{{$item->idTreino}}"
                                    onclick="return confirm('Deseja apagar o treino do dia {{$item->dia}} ?')">Excluir</a>
                            </td>
                        </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection