@extends('cabecalho')

@section('content')
<div class="fundo">
    <div>
        <div style="align-items: center;">
            <h1 class="titulo">{{ $aluno->name }} - {{$aluno->turma}} {{$aluno->curso}}</h1>
        </div>

        <div class="divChat">
            <div class="tabelaRolagemMensagem">
                @foreach ($mensagens as $item)
                    <div class="cardMensagem">
                        <h3 class="h3Mensagem">{{$item->tipo}}</h3>
                        <h6 class="h6Mensagem">{{$item->conteudo}}</h6>
                    </div>
                @endforeach
            </div>
            <form class="formChat" action="{{ route('enviarMensagem', $aluno->id) }}" method="POST">
                @csrf
                <textarea class="textChat" name="conteudo" rows="5" placeholder="Digite sua mensagem aqui"></textarea>
                <button class="botaoChat" type="submit">Enviar</button>
            </form>
        </div>

    </div>

</div>

@endsection