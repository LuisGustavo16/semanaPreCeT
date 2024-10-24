@extends ('cabecalho')
@section('content')
<div class="fundo">
<div class="divListarJogo">
        <div class="divTitulo"><h1>Informações</h1></div>
        <div class="divListarJogoEscolhido">
            <div class="campoListarTreinoEscolhido"><h1>Modalidade:</h1> <h2>{{$dados->modalidade}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Gênero:</h1> <h2>{{$dados->genero}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Competição:</h1> <h2>{{$dados->competicao}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Dia:</h1> <h2>{{$dados->dia}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Horário:</h1> <h2>{{$dados->horario}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Local:</h1> <h2>{{$dados->local}}</h2></div>
        </div>
    
        <div class="observacao"><h1>Observação:</h1> <h2>{{$dados->observacao}}</h2></div>

        <div class="centralizarDiv botoes">
            <a class="editarEscolhido" href="/jogos/editar/{{$dados->idJogoTime}}">Editar</a>
            <a class="apagarEscolhido" href="/jogos/apagar/{{$dados->idJogoTime}}/{{$dados->idTime}}"
                onclick="return confirm('Deseja apagar o treino ?')">Excluir</a>
        </div>
        
    </div>
</div>
@endsection