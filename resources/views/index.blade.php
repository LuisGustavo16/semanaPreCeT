<?php

$frase = "";
if (!function_exists('formaTextoNoticia')) {
    function formaTextoNoticia($texto, $limite)
    {
        // Divida o texto em palavras
        $words = explode(' ', $texto);

        // Se o número de palavras for menor ou igual ao limite, retorne o texto original
        if (count($words) <= $limite) {
            return $texto;
        }

        // Pega as primeiras palavras até o limite especificado
        $textoNovo = array_slice($words, 0, $limite);

        // Junta as palavras de volta em uma string e adiciona [...]
        return implode(' ', $textoNovo) . ' [...]';
    }
}
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class="divNoticiasGerais">
        @foreach ($dados as $item)
            <div class="divNoticia">
                <a class="linkNoticia" href="/noticias/selecionado/{{$item->idNoticias}}">
                    <h1 class="noticia">{{$item->titulo}}</h1>
                    <h4 class="conteudoNoticia">{{$frase = formaTextoNoticia($item->noticia, 30)}}</h4>
                    <div>
                        <a class="botaoNoticia" href="/noticias/editar/{{$item->idNoticias}}">Editar</a>
                        <a class="botaoNoticia" href="/noticias/apagar/{{$item->idNoticias}}">Apagar</a>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <a href="{{route("novaNoticia")}}" class="noticiasAdd">+</a>
</div>
@endsection