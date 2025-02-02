<?php
    $aux = true;
    $aux2 = true;
    $generos = ["Masculino", "Feminino", "Misto"]
    
?>

@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form action="/treino_amistosos/atualizar/{{$dados->idTreino}}" method="POST">
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
                <label for="dia">Dia:</label> <br>
                <input class="dia" type="date" name="dia" value="{{$dados->dia}}">
            </div>

            <div class="campo">
                <label for="horario">*Horário de Inicio:</label><br>
                <input class="horario" type="time" name="horarioInicio" value="{{$dados->horarioInicio}}" required>
            </div>

            <div class="campo">
                <label for="horario">*Horário de Fim:</label><br>
                <input class="horario" type="time" name="horarioFim" value="{{$dados->horarioFim}}" required>
            </div>


        </div>

        <div class="coluna">
            <div class="campo">
                <label for="genero">*Gênero:</label><br>
                <select class="selectGenero" type="checkbox" name="genero">
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

            <div class="campo">
                <label for="publico">Publico:</label> <br>
                <input type="text" name="publico" value="{{$dados->publico}}">
            </div>

            <div class="campo">
                <label for="local">Local:</label> <br>
                <input type="text" name="local" value="{{$dados->local}}">
            </div>

            <div class="campo">
                <label for="numeroMaximoParticipantes">*Nº de Alunos:</label><br>
                <input class="numeroMaximoParticipantes" type="text" name="numeroMaximoParticipantes" value="{{$dados->numeroMaximoParticipantes}}" required>
            </div>

        </div>

        <div class="coluna">
            <div class="campo">
                <label for="responsavel">Responsável:</label> <br>
                <input type="text" name="responsavel" value="{{$dados->responsavel}}">
            </div>
            <div class="campo">
                <label for="observacao">Observação:</label> <br>
                <textarea value="{{$dados->observacao}}" name="observacao"></textarea>
            </div>

        </div>

        <button class="botao" type="submit">Salvar</button>
    </form>
</div>
@endsection