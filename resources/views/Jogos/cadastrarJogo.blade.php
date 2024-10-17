@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form class="formJogo" action="/jogos/cadastrarJogos/{{$idTime}}" method="POST">
        @csrf
        <div class="coluna">
            <div class="campo">
                <label for="nome">*Horario:</label><br>
                <input type="time" name="horario">
            </div>

            <div class="campo">
                <label for="nome">Observação:</label><br>
                <textarea name="obervacao"></textarea>
            </div>
        </div>

        <div class="coluna">
            <div class="campo">
                <label for="nome">*Dia:</label><br>
                <input type="date" name="dia">
            </div>
        </div>

        <div class="coluna local">
            <div class="campo">
                <label for="nome">*Local:</label><br>
                <input type="text" name="local">
            </div>
            <div class="campo"></div>
            <div class="campo"></div>
            <div class="campo"></div>            
            <div class="campo"></div>
            <div class="campo"><button class="enviarJogo" type="submit">Enviar</button></div>
        </div>
    </form>
</div>
@endsection