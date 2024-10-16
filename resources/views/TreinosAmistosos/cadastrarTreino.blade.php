@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form action="{{route("cadastrarTreino")}}" method="POST">
        @csrf
        <div class="coluna">
            <div class="campo">
                <label for="modalidade">*Modalidade:</label><br>
                <select class="modalidade" type="checkbox" name="idModalidade" required>
                    @foreach ($modalidades as $modalidade)
                        <option value="{{$modalidade->idModalidade}}">{{$modalidade->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="campo">
                <label for="dia">*Dia:</label><br>
                <input class="dia" type="date" name="dia" required>
            </div>

            <div class="campo">
                <label for="horario">*Horário:</label><br>
                <input class="horario" type="time" name="horario" required>
            </div>

        </div>

        <div class="coluna">
            <div class="campo">
                <label for="genero">*Gênero:</label><br>
                <select type="checkbox" name="genero" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Misto">Misto</option>
                </select>
            </div>

            <div class="campo">
                <label for="publico">*Publico:</label><br>
                <input type="text" name="publico" required>
            </div>

            <div class="campo">
                <label for="local">*Local:</label><br>
                <input type="text" name="local" required>
            </div>

        </div>

        <div class="coluna">
            <div class="campo">
                <label for="responsavel">*Responsável:</label><br>
                <input type="text" name="responsavel" required>
            </div>

            <div class="campo">
                <label for="observacao">Observação:</label><br>
                <textarea name="observacao"></textarea>
            </div>

        </div>

        <button class="botao" type="submit">Enviar</button>
    </form>
</div>
@endsection