@extends ('cabecalho')
@section('content')
<div class="divListarAlunoEscolhido">
    <div class="divInformacoesGeraisAlunos">

        <div class="linhaDescircaoAlunoEscolhido">
            <div class="cardImagemAluno"><img class="fotoPerfil" src="/storage/imagens/fotoPerfil.webp"
                    alt="fotoPerfil"></div>
            <div class="campoDescricaoAluno">
                <h1>Descrição Esportiva: <h2 class="descricaoEsportiva">{{$dados->descricaoEsportiva}}</h2>
                </h1>
            </div>
        </div>

        <div class="linhaPreta"></div>

        <div class="divColunaInformacoesAluno">
            <h2 class="informacaoAluno"><strong>Nome:</strong> {{$dados->nome}}</h2>
            <h2 class="informacaoAluno"><strong>Matricula:</strong> {{$dados->matricula}}</h2>
            <h2 class="informacaoAluno"><strong>Data de Nascimento:</strong> {{$dados->dtNascimento}} ({{$dados->idade}} anos)</h2>
            <h2 class="informacaoAluno"><strong>Curso:</strong> {{$dados->turma}} {{$dados->curso}}</h2>
        </div>

    </div>
    <div class="timesChekinsAluno">
    <div class="informacoesTimesChekin">
                <div class="linhaTituloTimesChekins">
                    <h1 class="tituloTimeAlunos">Times que o(a) aluno(a) participa</h1>
                </div>
                <div class="tabelaRolagemTimesAluno">
                    @foreach ($timesAluno as $item)
                        <h2>{{$item}}</h2>
                    @endforeach
                </div>
            </div>
        <div class="informacoesTimesChekin">

        </div>
    </div>
</div>
@endsection