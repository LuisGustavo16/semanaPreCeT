@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form class="formNoticia" action="/noticias/atualizar/{{$dados->idNoticias}}" method="POST">
        @csrf
        <div class="inputTitulo">
            <textarea name="titulo" placeholder="Título">{{$dados->titulo}}</textarea>
        </div>

        <div class="inputConteudo">
            <textarea name="noticia" placeholder="Notícia">{{$dados->noticia}}</textarea>
        </div>

        <button class="botaoEnviarNoticia" type="submit">Enviar</button>
    </form>
</div>
@endsection