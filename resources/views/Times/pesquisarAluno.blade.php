@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form class="formPesquisarAluno" action="/times/mostrarAlunosPesquisa/{{$idTime}}" method="POST">
        @csrf
        <input  type="text" name="nomeAluno">

        <button class="botaoPesquisarAluno" type="submit">Enviar</button>
    </form>
</div>
@endsection