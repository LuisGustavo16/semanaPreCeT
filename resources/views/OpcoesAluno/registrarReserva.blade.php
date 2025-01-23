<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEE</title>
</head>

<style>
    :root {
        /*Cores do Site*/
        --white: #E6E8F4;
        --blue: #00198E;
        --yellow: #FFDF2B;
        --orange: #FFC24B;
    }

    .container {
        width: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
        background: var(--white);
        margin: 0px;
        grid-template-rows: repeat(3, 12rem);
        font-family: Arial, sans-serif;
    }


    h2 {
        width: 100%;
        text-align: center;
        height: 10px;
        font-size: 2rem;
        font-weight: 800;
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        text-decoration: dashed;
    }

    form {
        background-color: white;
        display: grid;
        grid-template-columns: repeat(1, 100%);
        grid-template-rows: repeat(8, 5rem);
        padding: 1rem;
        width: 20rem;
        height: 37rem;
        box-shadow: 0.1rem 0.1rem 0.9rem black;
        margin-top: 1rem;
    }

    label {
        font-size: 1.3rem;
        font-weight: 400;
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        text-decoration: dashed;
    }

    input {
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        font-size: 1.1rem;
    }

    select {
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        font-size: 1.3rem;
    }

    div {
        display: grid;
        grid-column: repeat(1, 10px);
        grid-template-rows: repeat(2, 2rem);
    }

    button {
        background-color: var(--blue);
        font-family: Avantgardef, TeX Gyre Adventor, URW Gothic L, sans-serif;
        color: white;
        font-size: 1.35rem;
        font-weight: 800;
    }
</style>

@extends ('cabecalho3')
@section('content')

<body class="container">
    <h2>Realizar Reserva</h2>
    <div style="display: flex; width: 100%; align-itens: center; justify-content: center; margin-top: 2rem">
        <form action="/alunos/realizarReserva" method="post">
            @csrf

            <input style="display: none;" type="text" name="idAluno" value="{{$aluno->id}}">
            <input style="display: none;" type="text" name="status" value="P">

            <div>
                <label for="">*Local:</label>
                <select name="local" id="">
                    <option value="Ginásio">Ginásio</option>
                    <option value="Quadra">Quadra</option>
                </select>
            </div>

            <div>
                <label for="">*Data:</label>
                <input type="date" name="dia" required>
            </div>

            <div>
                <label for="">*Horário de inicio:</label>
                <input type="time" name="horarioInicio" required>
            </div>

            <div>
                <label for="">*Horário de fim:</label>
                <input type="time" name="horarioFim" required>
            </div>

            <div>
                <label for="">*Finalidade:</label>
                <input type="text" name="finalidade" required>
            </div>

            <div>
                <label for="">*Número de pessoas:</label>
                <input style="height: 2rem" type="number" name="numeroPessoas" required>
            </div>

            <div>
                <label for="">*Tipo de reserva</label>
                <select onchange="conferirCampo()" id="tipoReserva" name="tipo">
                    <option value="normal">Normal</option>
                    <option value="regular">Regular</option>
                </select>
            </div>

            <div id="campoDiaEncerramento" style="margin-bottom: 2rem; display: none">
                <h3>Sua reserva será cancelada automaticamente em 6 meses.</h3>
            </div>

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</body>
@endsection
<script>
    function conferirCampo() {
        const campoDiaEncerramento = document.getElementById('campoDiaEncerramento');
        const tipoReserva = document.getElementById('tipoReserva');

        if (tipoReserva.value === 'regular') {
            campoDiaEncerramento.style.display = 'block';
        } else {
            campoDiaEncerramento.style.display = 'none';
        }
    }
</script>

</html>