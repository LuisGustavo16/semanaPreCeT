
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class=pageListarTreinoEscolhido>
        <div class="divListar">
            <div class="divTitulo">
                <h1>Informações</h1>
            </div>
            <div class="divListarTreinoEscolhido">
                <div class="campoListarTreinoEscolhido">
                    <h1>Modalidade:</h1>
                    <h2>{{$modalidade->nome}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1>Dia:</h1>
                    <h2>{{$dados->dia}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1>Horário:</h1>
                    <h2>{{$dados->horarioInicio}}-{{$dados->horarioFim}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1>Gênero:</h1>
                    <h2>{{$dados->genero}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1>Público:</h1>
                    <h2>{{$dados->publico}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1>Local:</h1>
                    <h2>{{$dados->local}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1>Responsável:</h1>
                    <h2>{{$dados->responsavel}}</h2>
                </div>
                <div class="campoListarTreinoEscolhido">
                    <h1>Nº de Alunos:</h1>
                    <h2>{{$dados->vagasOcupadas}}/{{$dados->numeroMaximoParticipantes}}</h2>
                </div>
            </div>

            <div class="observacao">
                <h1>Observação:</h1>
                <h2>{{$dados->observacao}}</h2>
            </div>

            <div class="centralizarDiv botoes">
                <a class="editarEscolhido" href="../../../treino_amistosos/editar/{{$dados->idTreino}}">Editar</a>
                <a class="apagarEscolhido" href="../../../treino_amistosos/apagar/{{$dados->idTreino}}"
                    onclick="return confirm('Deseja apagar o treino ?')">Excluir</a>
            </div>

        </div>

        <div class="listarTreinoEscolhido">
            <form class="formularioEscondidoAlunos" action="/treino_amistosos/marcarPresenca/{{$dados->idTreino}}" method="post">
                @csrf
                <div class="linhaTituloTreino">
                    <h1>Nome</h1>
                    <h1>Curso</h1>
                    <h1>Marcar presença</h1>
                </div>
                <div class="tabelaRolagemTreino">
                    @foreach ($chekins as $item)
                        <div class="linhaInformacoesTreino">
                            <h2 style="font-size: 1.2rem">{{$item->nomeAluno}}</h2>
                            <h2 style="font-size: 1.2rem;">{{$item->turmaAluno}}</h2>
                            <input class="checkboxCheckins" type="checkbox" name="checkins[]" value="{{$item->idCheckin}}"
                                {{ $item->situacao ? 'checked' : '' }}>
                        </div>
                    @endforeach
                </div>
                <button class="botaoMarcarPresenca" type="submit">Marcar presença</button>
            </form>
        </div>
    </div>
    <a class="gerarPDF" href="/treino_amistosos/gerarPDF/{{$dados->idTreino}}">Gerar PDF</a>
</div>
@endsection