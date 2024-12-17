<?php
$aux = false;
$classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
<div class="centralizarDiv">
</div>
<div class="fundoTimeEscolhido">
    <div class="divListarTimeEscolhido">
        <div class="informacoesTimeEscolhido">
            <div class="linhaInformacoesGerais">
                <h1>Modalidade: <h2>{{$dados->nomeModalidade}} {{$dados->genero}}</h2>
                </h1>
                <h1>Competição: <h2>{{$dados->competicao}}</h2>
                </h1>
            </div>

            <div class="listarJogosTimeEscolhido">
                <div class="linhaTituloJogos">
                    <h1>Dia</h1>
                    <h1>Horário</h1>
                    <h1>Local</h1>
                    <h1>Opções</h1>
                </div>
                <div class="tabelaRolagemJogos">
                    @foreach ($jogos as $jogo)
                        <div class="linhaInformacoesJogos">
                            <h2>{{$jogo->dia}}</h2>
                            <h2>{{$jogo->horario}}</h2>
                            <h2>{{$jogo->local}}</h2>
                            <h2><a class="linkIcone" href="/jogos/selecionado/{{$jogo->idJogoTime}}">
                                    <img class="icone verMais" src="/storage/assets/ver.png" alt="verMais">
                                </a>
                                <a class="linkIcone" href="/jogos/editar/{{$jogo->idJogoTime}}">
                                    <img class="icone" src="/storage/assets/editar.png" alt="editar">
                                </a>
                                <a class="linkIcone" href="/jogos/apagar/{{$jogo->idJogoTime}}/{{$jogo->idTime}}"
                                    onclick="return confirm('Deseja apagar o jogo do dia {{$jogo->dia}} ?')">
                                    <img class="icone apagar" src="/storage/assets/apagar.png" alt="apagar">
                                </a>
                            </h2>
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="botaoAddJogo" href="/jogos/formularioCadastro/{{$dados->idTime}}">Adicionar Jogo</a>
        </div>

        <div class="informacoesAlunosTimeEscolhido">
            <div class="linhaTituloAlunos">
                <h1>Nome</h1>
                <h1>Turma</h1>
                <h1>Opções</h1>
            </div>
            <div class="tabelaRolagemAlunos">
                @foreach ($alunos as $aluno)
                    <div class="linhaInformacoesAlunos">
                        <h2 class="nome">{{$aluno->name}}</h2>
                        <h2>{{$aluno->turma}} {{$aluno->curso}}</h2>
                        <div class="opcoesIcones">
                            <a href="/alunos/verPerfilAluno/{{$aluno->id}}">
                                <img class="icone verMais" src="/storage/assets/ver.png" alt="verMais">
                            </a>
                            <a class="linkIcone" href="../../../times/retirarAluno/{{$aluno->id}}/{{$dados->idTime}}">
                                <img class="icone apagar" src="/storage/assets/apagar.png" alt="apagar">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="botaoAddAluno" href="../../../times/formPesquisarAluno/{{$dados->idTime}}">Adicionar aluno ao
                time</a>
        </div>
    </div>
</div>
@endsection