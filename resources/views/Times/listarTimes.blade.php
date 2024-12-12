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
</div>
@endsection