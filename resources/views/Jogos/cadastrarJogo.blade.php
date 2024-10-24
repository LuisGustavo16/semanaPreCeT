@extends ('cabecalho')
@section('content')
<div class="fundo">
<form class="formJogo" action="/jogos/atualizar/{{$dados->idJogoTime}}" method="POST">
        @csrf
        <div class="linha">
            <div class="campo">
                <label for="nome">*Horario:</label><br>
                <input type="time" name="horario"">
            </div>

            <div class="campo">
                <label for="nome">*Dia:</label><br>
                <input type="date" name="dia" >
            </div>

            <div class="campo">
                <label for="nome">*Local:</label><br>
                <input type="text" name="local">
            </div>
        </div>

        <div class="linha">
            <div class="campo">
                <label for="nome">Observação:</label><br>
                <textarea name="observacao"></textarea>
            </div>
        </div>

        <div class="centralizarBotaoEnviaJogo">
            <div><button class="enviarJogo" type="submit">Enviar</button></div>
        </div>
    </form>
</div>
@endsection