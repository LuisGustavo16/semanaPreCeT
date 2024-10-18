<?php

namespace App\Http\Controllers;

use App\Models\JogosTimes;
use Illuminate\Http\Request;
use App\Models\Time;

class controllerJogosTimes extends Controller
{

    public function index()
    {
        $dados = JogosTimes::all();
        return view("Jogos/listarJogos", compact("dados"));
    }

    
    public function create(string $idTime)
    {
        return view('Jogos/cadastrarJogo', compact('idTime'));
    }

    public function store(Request $request, string $idTime)
    {
        $dados = new JogosTimes();
        $dados->dia = $request->input("dia");
        $dados->horario = $request->input("horario");
        $dados->local = $request->input("local");
        $dados->observacao = $request->input("observacao");
        $dados->idTime = $idTime;
        $dados->save();
        return redirect()->route('verTime', ['idTime' => $idTime]);
    }


    public function show(string $idJogoTime)
    {
        $dados = JogosTimes::find( $idJogoTime );
        $time = Time::find( $dados->idTime);
        $dados->nomeTime = $time->modalidade . " " . $time->genero;
        return view('Jogos/listarJogoEscolhido', compact('dados'));
    }

    public function edit(string $idJogoTime)
    {
        $dados = JogosTimes::find( $idJogoTime );
        return view('Jogos/formEditarJogo', compact('dados'));
    }

    public function update(Request $request, string $idJogoTime)
    {
        $dados = JogosTimes::find( $idJogoTime );
        $dados->modalidade = $request->input('modalidade');
        $dados->dia = $request->input('dia');
        $dados->horario = $request->input('horario');
        $dados->observacao = $request->input('observacao');
        $dados->save();
        return view('Jogos/listarJogoEscolhido', compact('dados'));
    }

    public function destroy(string $idJogo, string $idTime)
    {
        $dados = JogosTimes::find($idJogo);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('verTime', ['idTime' => $idTime]);
        }
    }
}
