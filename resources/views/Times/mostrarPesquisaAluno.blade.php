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
                    <td>{{$item->name}}</td>
                    <td>{{$item->turma}} {{$item->curso}}</td>
                    <td>
                        <a href="/alunos/verPerfilAluno/{{$item->id}}">Ver</a>
                        <a href="../../alunos/adicionarAluno/{{$item->id}}/{{$idTime}}">Adicionar</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection