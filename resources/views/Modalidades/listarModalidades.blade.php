<?php
    $aux = false;
    $classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
    <div class="fundo">
        <table class="tableListarModalidades">
            <caption>Modalidades</caption>
            <thead>
                <tr class="amarelo">
                    <th>Nome</th>
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
                        <tr class="{{$classe}} modalidade">
                            <td>{{$item->nome}}</td>
                            <td>
                                <a href="../modalidades/editar/{{$item->idModalidade}}">Editar</a>
                                <a href="../modalidades/apagar/{{$item->idModalidade}}" onclick="return confirm('Deseja apagar a modalidade {{$item->nome}} ?')">Excluir</a>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection