@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class="divListar">
        <div class="divTitulo"><h1>Informações</h1></div>
        <div class="divListarTreinoEscolhido">
            <div class="campoListarTreinoEscolhido"><h1>Modalidade:</h1> <h2>{{$modalidade->nome}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Dia:</h1> <h2>{{$dados->dia}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Horário:</h1> <h2>{{$dados->horario}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Gênero:</h1> <h2>{{$dados->genero}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Público:</h1> <h2>{{$dados->publico}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Local:</h1> <h2>{{$dados->local}}</h2></div>
            <div class="campoListarTreinoEscolhido"><h1>Responsável:</h1> <h2>{{$dados->responsavel}}</h2></div>
        </div>
    
        <div class="observacao"><h1>Observação:</h1> <h2>{{$dados->observacao}}</h2></div>

        <div class="centralizarDiv botoes">
            <a href="../../../treino_amistosos/editar/{{$dados->idTreino}}">Editar</a>
            <a href="../../../treino_amistosos/apagar/{{$dados->idTreino}}"
                onclick="return confirm('Deseja apagar o treino ?')">Excluir</a>
        </div>
        
    </div>
    

</div>
@endsection