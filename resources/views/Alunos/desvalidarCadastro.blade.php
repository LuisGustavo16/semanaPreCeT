
@extends ('cabecalho')
@section('content')
<div class="fundoDesvalidar">
    <h1 class="textoDesvalidar">Ao utilizar essa opção, o sistema irá apagar todos os alunos do 3º ano serão apagados.</h1>
    <form class="formDesvalidar" action="/alunos/desvalidarAlunos">
        <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
            <button onclick="return confirm('Deseja apagar todos os alunos do terceiro ano?')" class="botaoDesvalidar" type="submit">Confirmar</button>
        </div>
        
    </form>
</div>
@endsection
