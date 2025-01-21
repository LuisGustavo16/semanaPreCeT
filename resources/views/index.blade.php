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

<style>
    :root {
        /*Cores do Site*/
        --white: #E6E8F4;
        --blue: #00198E;
        --yellow: #FFDF2B;
        --orange: #FFC24B;
        --yellowSecondary: #FFF1A8;
        --bottonAccept: #A2F294;
        --bottonAcceptSecondary: #4F9552;
        --bottonRecuse: #F87D7D;
        --bottonRecuseSecondary: #AC3C3C;
    }

    /*div para organizar todas as noticias*/
    .divNoticiasGerais {
        display: grid;
        grid-template-columns: repeat(2, 29rem);
        grid-template-rows: repeat(4, 20rem);
        align-items: center;
        justify-content: center;
        height: 150vh;
        width: 65rem;
        background-color: white;
        box-shadow: -0.1rem 0.1rem 2rem black;
        margin-top: 2rem;
        padding-bottom: 2rem;
        padding-left: 2rem;
        margin-bottom: 3rem;
    }

    /*Titulo "Noticias"*/
    .tituloNoticia {
        width: 100%;
        height: 1rem;
    }

    .tituloNoticia h1 {
        text-align: center;
        font-family: "Inter", sans-serif;
        font-size: 2.4rem;
        color: var(--blue);
        text-shadow: 0.1rem 0.1rem 0.01rem black;
    }

    /*div de cada noticia*/
    .divNoticia {
        height: 15rem;
        width: 25rem;
        padding-left: 1rem;
        border: solid 0.1rem black;
        background-color: white;
        color: black;
        text-decoration: none;
        display: grid;
        grid-template-columns: repeat(1, 25rem);
        grid-template-rows: repeat(2, 12rem);
    }

    /*link que faz levar para a noticia*/
    .linkNoticia {
        text-decoration: none;
        color: black;
        height: 100%;
    }

    /*Titulo da noticia e conteúdo da noticia*/
    .noticia {
        font-family: "Inter", sans-serif;
        font-size: 1rem;
        text-align: left;
        color: var(--blue);
        text-decoration: none;
        max-width: 29rem;
        word-wrap: break-word;
    }

    .noticia:hover {
        text-decoration: underline;
        color: #00146c;
    }

    .conteudoNoticia {
        font-family: "Inter", sans-serif;
        max-width: 24rem;
        font-weight: 400;
        word-wrap: break-word;
    }

    /*Botão de Add noticia*/
    .noticiasAdd {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        right: 4rem;
        bottom: 1rem;
        height: 3.2rem;
        width: 3.2rem;
        border-radius: 2rem;
        background-color: var(--blue);
        text-decoration: none;
        color: white;
        font-size: 3rem;
        font-weight: 900;
    }

    .noticiasAdd h1 {
        position: fixed;
        right: 4rem;
        bottom: 1rem;
    }

    /*editar e apagar*/
    .botaoNoticia {
        color: var(--blue);
        text-decoration: none;
        font-family: "Inter", sans-serif;
    }
</style>

@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class="divNoticiasGerais">
        @foreach ($dados as $item)
            <div class="divNoticia">
                <a class="linkNoticia" href="/noticias/selecionado/{{$item->idNoticias}}">
                    <h1 class="noticia">{{$item->titulo}}</h1>
                    <h4 class="conteudoNoticia">{{$frase = formaTextoNoticia($item->noticia, 20)}}</h4>
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