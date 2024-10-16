<?php
$aux = false;
$classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
<div class="centralizarDiv">
    <a class="botaoAddAluno" href="../../../times/formPesquisarAluno/{{$dados->idTime}}">Adicionar aluno ao time</a>
</div>
<div class="fundo">
    <div class="divListarTimeEscolhido">

        <div class="informacoesTimeEscolhido">
            <div class="linhaTituloAlunos">
                <h1>Nome</h1>
                <h1>Turma</h1>
                <h1>Opções</h1>
            </div>
            <div class="tabelaRolagem">
                    @foreach ($alunosTimes as $alunoTime)
                        @foreach ($alunos as $aluno)
                            @if ($alunoTime->idTime == $dados->idTime and $aluno->idAluno == $alunoTime->idAluno)
                            <div class="linhaInformacoesAlunos">
                                <h2>{{$aluno->nome}}</h2>
                                <h2>{{$aluno->turma}} {{$aluno->curso}}</h2>
                                <h2><a href="../../../times/retirarAluno/{{$aluno->idAluno}}/{{$dados->idTime}}">Remover Aluno</a></h>
                            </div>
                            @endif
                        @endforeach
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection