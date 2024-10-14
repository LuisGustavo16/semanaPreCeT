<?php
    $aux = false;
    $classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <table>
        <thead>
            <tr class="amarelo">
                <th>Nome</th>
                <th>Turma</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $item)
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
                    <td>{{$item->nome}}</td>
                    <td>{{$item->turma}} {{$item->curso}}</td>
                    <td>
                        <a href="">Ver</a>
                        <a href="../../alunos/adicionarAluno/{{$item->idAluno}}/{{$idTime}}">Adicionar</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection