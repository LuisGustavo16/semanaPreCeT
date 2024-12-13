@extends('cabecalho')

@section('content')
    <h1>Enviar Mensagem para {{ $aluno->name }}</h1>

    <form action="{{ route('enviarMensagem', $aluno->id) }}" method="POST">
        @csrf
        <textarea name="conteudo" rows="5" placeholder="Digite sua mensagem aqui"></textarea>
        <button type="submit">Enviar</button>
    </form>
@endsection
