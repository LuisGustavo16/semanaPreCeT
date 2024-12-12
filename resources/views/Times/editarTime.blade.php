<?php
$aux = true;
$aux2 = true;
$generos = ["Masculino", "Feminino", "Misto"]
?>

@extends ('cabecalho')
@section('content')
<div class="fundo divEditarTime">
    <form action="/times/atualizar/{{$dados->idTime}}" method="POST">
        @csrf
        <div class="coluna">
            <div class="campo">
                <label for="modalidade">*Modalidade:</label><br>
                <select class="modalidade" type="checkbox" name="idModalidade">
                    @foreach ($modalidades as $modalidade)
                        @if ($aux)
                            <option value="{{$nomeModalidade->idModalidade}}">{{$nomeModalidade->nome}}</option>
                            {{$aux = false}}
                        @endif
                        @if ($modalidade->idModalidade != $nomeModalidade->idModalidade)
                            <option value="{{$modalidade->idModalidade}}">{{$modalidade->nome}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="campo">
                <label for="genero">*Gênero:</label><br>
                <select type="checkbox" name="genero">
                    @foreach ($generos as $genero)
                        @if ($aux2)
                            <option value="{{$dados->genero}}">{{$dados->genero}}</option>
                            {{$aux2 = false}}
                        @endif
                        @if ($genero != $dados->genero)
                            <option value="{{$genero}}">{{$genero}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

        </div>

        <div class="coluna">
            <div class="campo">
                <label for="publico">Competição:</label> <br>
                <input type="text" name="competicao" value="{{$dados->competicao}}">
                <button class="botao" type="submit">Salvar</button>
            </div>
        </div>

        
    </form>


</div>
@endsection