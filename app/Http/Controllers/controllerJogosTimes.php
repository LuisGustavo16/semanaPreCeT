<?php

namespace App\Http\Controllers;

use App\Models\JogosTimes;
use App\Models\Modalidade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Time;

class controllerJogosTimes extends Controller
{

    public function index()
    {
        $dados = JogosTimes::all();
        foreach ($dados as $item) {
            $time = Time::find( $item->idTime);
            $modalidade = Modalidade::find($time->idModalidade);
            $item->nomeTime = $modalidade->nome . " " . $time->genero . ' - ' . $time->competicao;
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia)->format('d/m');
            $item->horario = Carbon::parse($item->horario)->format('h:m');
        }
        
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
        $dados->modalidade = Modalidade::find($time->idModalidade)->nome;
        $dados->genero = $time->genero;
        $dados->competicao = $time->competicao;
        /*Trocar o formato do dia e do horário*/
        $dados->dia = Carbon::parse($dados->dia)->format('d/m');
        $dados->horario = Carbon::parse($dados->horario)->format('h:m');
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
        $dados->dia = $request->input('dia');
        $dados->horario = $request->input('horario');
        $dados->observacao = $request->input('observacao');
        $dados->save();
        /*Pega os dados para listar novamente após salvar*/
        $time = Time::find( $dados->idTime);
        $dados->modalidade = Modalidade::find($time->idModalidade)->nome;
        $dados->genero = $time->genero;
        $dados->competicao = $time->competicao;
        /*Trocar o formato do dia e do horário*/
        $dados->dia = Carbon::parse($dados->dia)->format('d/m');
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
