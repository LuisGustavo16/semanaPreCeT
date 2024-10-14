<?php

namespace App\Http\Controllers;

use App\Models\TreinoAmistoso;
use App\Models\Modalidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class controllerTreinoAmistoso extends Controller
{
    /*Envia todos os dados para serem listados*/
    public function index() {
        $dados = TreinoAmistoso::all();
        foreach ($dados as $item) {
            $modalidade = Modalidade::find($item->idModalidade);
            $item->nomeModalidade = $modalidade->nome;
        }
        return view('TreinosAmistosos/listarTreinos', compact('dados'));
    }

    /**/
    public function create() {
        $modalidades = Modalidade::all();
        return view('TreinosAmistosos/cadastrarTreino', compact('modalidades'));
    }

    /*Ao clicar em um treino, os dados dele serão enviados*/
    public function verTreino(string $idTreino) {
        $dados = TreinoAmistoso::find($idTreino);
        $modalidade = Modalidade::find($dados->idModalidade);
        if (isset($dados))
            return view('TreinosAmistosos/listarTreinoEscolhido', compact('dados', 'modalidade'));
    }

    /*Recebe o id de um dado para ser editado e posteriormente edita ele*/
    public function update (string $idTreino, Request $request) {
        $dados = TreinoAmistoso::find($idTreino);
        if (isset($dados)) {
            $dados->idModalidade = $request->input('idModalidade');
            $dados->dia = $request->input('dia');
            $dados->horario = $request->input('horario');
            $dados->genero = $request->input('genero');
            $dados->publico = $request->input('publico');
            $dados->local = $request->input('local');
            $dados->responsavel = $request->input('responsavel');
            $dados->observacao = $request->input('observacao');
            $dados->save();
            return redirect()->route('indexTreino');
        }
        return redirect()->route('indexTreino');
    }

    /*Cadastra um novo dado na tabela*/
    public function store(Request $request) {
        $dados = new TreinoAmistoso();
        $dados->idModalidade = $request->input('idModalidade');
        $dados->dia = $request->input('dia');
        $dados->horario = $request->input('horario');
        $dados->genero = $request->input('genero');
        $dados->publico = $request->input('publico');
        $dados->local = $request->input('local');
        $dados->responsavel = $request->input('responsavel');
        $dados->observacao = $request->input('observacao');
        if ($dados->save())
            return redirect()->route('indexTreino')->with('success', 'Treino cadastrado com sucesso!!');
        else    
            return redirect()->route('indexTreino')->with('danger', 'Erro ao tentar cadastrar um novo treino...');
    }

    /*Apaga um dado da tabela*/
    public function destroy(string $id) {
        $dados = TreinoAmistoso::find($id);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('indexTreino');
        }
    }

    /*Envia os dados para serem editados*/
    public function edit(string $idTreino) {
        $dados = TreinoAmistoso::find($idTreino);
        $modalidades = Modalidade::all();
        $nomeModalidade = Modalidade::find($dados->idModalidade);
        if (isset($dados))
            return view('TreinosAmistosos/editarTreino', compact('dados', 'modalidades', 'nomeModalidade'));
    }

}
