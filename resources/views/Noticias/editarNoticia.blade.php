<style>
    .formNoticia {
        padding-top: 2rem;
        display: block;
        width: 60rem;
        height: 37rem;
    }

    .inputTitulo {
        width: 100%;
    }

    .inputTitulo textarea {
        width: 90%;
        height: 1.7rem;
    }

    .inputConteudo textarea {
        margin-top: 1rem;
        width: 90%;
        height: 25rem;
    }

    .botaoEnviarNoticia {
        position: absolute;
        bottom: -14rem;
        height: 2rem;
        width: 10rem;
        border-radius: 2rem;
        background-color: var(--blue);
        color: white;
        font-size: 1.2rem;
        font-family: "Inter", sans-serif;
        border: 0;
        cursor: pointer;
    }
</style>
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