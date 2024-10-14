@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form class="formNoticia" action="{{route("cadastrarNoticia")}}" method="POST">
        @csrf
            <div class="inputTitulo">
                <textarea name="titulo" placeholder="Título" maxlength="90"></textarea>
            </div>

            <div class="inputConteudo">
                <textarea name="noticia" placeholder="Notícia"></textarea>
            </div>

        <button class="botaoEnviarNoticia" type="submit">Enviar</button>
    </form>
</div>
@endsection