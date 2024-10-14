@extends ('cabecalho')
@section('content')
<div class="fundo formModalidade">
        <form action="{{route("cadastrarModalidade")}}" method="POST">
            @csrf
            <div class="coluna">
                <div class="campo">
                    <label for="nome">*Nome:</label><br>
                    <input type="text" name="nome">
                </div>
            </div>

            <button class="botao" type="submit">Enviar</button>
        </form>
    </div>
@endsection