<?php
    $aux = false;
    $classe = 'branco';
?>
@extends ('cabecalho')
@section('content')
    <div class="fundo">
        <table class="tableListarModalidades">
            <caption>Modalidades</caption>
            <thead>
                <tr class="amarelo">
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <?php 
                        if ($aux == true) {
                            $classe = 'amarelo';
                            $aux = false;
                        } elseif ($aux == false) {
                            $classe = 'branco';
                            $aux = true;
                        }
                    ?>
                        <tr class="{{$classe}} modalidade">
                            <td>{{$item->nome}}</td>
                            <td>
                                <a href="../modalidades/editar/{{$item->idModalidade}}"><img src="{{asset('storage/assets/editar.png')}}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href="../modalidades/apagar/{{$item->idModalidade}}" onclick="return confirm('Deseja apagar a modalidade {{$item->nome}} ?')"><img src="{{asset('storage/assets/apagar.png')}}" alt="" style="width: 40px; height: 40px;"></a>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection