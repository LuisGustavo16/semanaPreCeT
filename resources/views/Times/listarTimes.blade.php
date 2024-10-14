<?php
$aux = false;
$classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <table>
        <caption>TIMES</caption>
        <thead>
            <tr class="amarelo">
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
                                    <td>{{$item->nomeModalidade}} {{$item->genero}}</td>
                                    <td>{{$item->competicao}}</td>
                                    <td>
                                        <a href="../times/verTime/{{$item->idTime}}">Ver</a>
                                        <a href="../times/editar/{{$item->idTime}}">Editar</a>
                                        <a href="../times/apagar/{{$item->idTime}}"
                                            onclick="return confirm('Deseja apagar o time do {{$item->competicao}} ?')">Excluir</a>
                                    </td>
                        </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection