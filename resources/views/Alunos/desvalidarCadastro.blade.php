
@extends ('cabecalho')
@section('content')
<div class="fundoDesvalidar">
    <h1 class="textoDesvalidar">Ao utilizar essa opção, o sistema irá desvalidar todos os alunos que tiveram seu cadastro aceito</h1>
    <form class="formDesvalidar" action="/alunos/desvalidarAlunos">
        <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
            <button class="botaoDesvalidar" type="submit">Confirmar</button>
        </div>
        
    </form>
</div>
@endsection
