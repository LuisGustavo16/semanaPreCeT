@extends ('cabecalho')
@section('content')
    <div class="fundo formModalidade">
        <form action="/modalidades/atualizar/{{$dados->idModalidade}}" method="POST">
            @csrf
            <div class="coluna">
                <div class="campo">
                    <label for="nome">Nome:</label> <br>
                    <input type="text" name="nome" value="{{$dados->nome}}">
                </div>

            </div>

            <button class="botao" type="submit">Salvar</button>
        </form>
    </div>
@endsection