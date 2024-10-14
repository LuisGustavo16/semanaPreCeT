<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modalidade;
use Illuminate\Http\Request;

class controllerModalidades extends Controller
{
    /*Envia todos os dados para serem listados*/
    public function index() {
        $dados = Modalidade::all();
        return view('Modalidades/listarModalidades', compact('dados'));
    }

    /*Recebe o id de um dado para ser editado e posteriormente edita ele*/
    public function update (string $idModalidade, Request $request) {
        $dados = Modalidade::find($idModalidade);
        if (isset($dados)) {
            $dados->nome = $request->input('nome');
            $dados->save();
            return redirect()->route('indexModalidade');
        }
        return redirect()->route('indexModalidade');
    }

    /*Cadastra um novo dado na tabela*/
    public function store(Request $request) {
        $dados = new Modalidade();
        $dados->nome = $request->input('nome');
        $dados->save();
        return redirect()->route('indexModalidade');
    }

    /*Apaga um dado da tabela*/
    public function destroy(string $idModalidade) {
        $dados = Modalidade::find($idModalidade);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('indexModalidade');
        }
    }

    /*Envia os dados para serem editados*/
    public function edit(string $idModalidade) {
        $dados = Modalidade::find($idModalidade);
        if (isset($dados))
            return view('Modalidades/editarModalidade', compact('dados'));
    }
}
