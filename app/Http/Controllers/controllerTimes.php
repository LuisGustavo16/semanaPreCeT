<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\AlunosTime;
use App\Models\Aluno;
use App\Models\Modalidade;
use App\Models\JogosTimes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class controllerTimes extends Controller
{
    public function __construct () {
        $this -> middleware('auth');
    }
    /*Envia todos os dados para serem listados*/
    public function index() {
        $dados = Time::all();
        foreach ($dados as $item) {
            $modalidade = Modalidade::find($item->idModalidade);
            $item->nomeModalidade = $modalidade->nome;
        }
        return view('Times/listarTimes', compact('dados'));
    }

    /*Ao clicar em um treino, os dados dele serão enviados*/
    public function verTime(string $idTime) {
        /*Informações gerais*/
        $dados = Time::find($idTime);
        $modalidade = Modalidade::find($dados->idModalidade);
        $dados->nomeModalidade = $modalidade->nome;
        
        /*Jogos e alunos*/
        $jogos = JogosTimes::all()->where('idTime', $idTime);
        foreach ($jogos as $item) {
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia)->format('d/m');
            $item->horario = Carbon::parse($item->horario)->format('h:m');
        }
        $alunos_times = AlunosTime::all()->where('idTime', $idTime);
        $alunos = [];
        /*Buscando cada aluno participante do time*/
        foreach ($alunos_times as $item) {
            array_push($alunos, Aluno::find($item->idAluno));
        }

        if (isset($dados)) {
            return view('Times/listarTimeEscolhido', compact('dados', 'alunos', 'jogos'));
        } else { 
            return redirect()->route('indexTime');
        }
    }

    /*Recebe o id de um dado para ser editado e posteriormente edita ele*/
    public function update (string $idTime, Request $request) {
        $dados = Time::find($idTime);
        if (isset($dados)) {
            $dados->idModalidade = $request->input('idModalidade');
            $dados->genero = $request->input('genero');
            $dados->competicao = $request->input('competicao');
            $dados->save();
            return redirect()->route('indexTime');
        }
        return redirect()->route('indexTime');
    }

    /*Cadastra um novo dado na tabela*/
    public function store(Request $request) {
        $dados = new Time();
        $dados->idModalidade = $request->input('idModalidade');
        $dados->genero = $request->input('genero');
        $dados->competicao = $request->input('competicao');
        $dados->save();
        return redirect()->route('indexTime');
    }

    /*Apaga um dado da tabela*/
    public function destroy(string $idTime) {
        $dados = Time::find($idTime);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('indexTime');
        }
    }

    /*Envia os dados para serem editados*/
    public function edit(string $idTime) {
        $dados = Time::find($idTime);
        $modalidades = Modalidade::all();
        $nomeModalidade = Modalidade::find($dados->idModalidade);
        if (isset($dados))
            return view('Times/editarTime', compact('dados', 'modalidades', 'nomeModalidade'));
    }

    /*Apaga um aluno de um time*/
    public function deleteAlunoTime(string $idAluno, string $idTime) {
        $alunoTime = AlunosTime::where('idAluno', $idAluno)->where('idTime', $idTime);
        if (isset($alunoTime)) {
            $alunoTime->delete();
            return redirect()->route('verTime', ['idTime' => $idTime]);
        }
    }

    public function enviaModalidade() {
        $modalidades = Modalidade::all();
        return view('Times/cadastrarTime', compact('modalidades'));
    }

    /*Envia o id do time para o formulario de pesquisa de aluno, para que quando adicionar o aluno, adionce naquele time*/
    public function pesquisarAluno(string $idTime) {
        $alunos = Aluno::all();
        return view('Times/pesquisarAluno', compact('idTime', 'alunos'));
    }

    /*Envia os dados dos alunos para poder adicionar no time*/
    public function mostrarAlunosPesquisa(Request $request, string $idTime) {
        $pesquisa = $request->input('nomeAluno');
        $alunos = DB::table('alunos')->select("nome", "idAluno", "turma", "curso")->where(DB::raw('lower(nome)'), 'like', strtolower($pesquisa) . '%') ->get();
        return view('Times/mostrarPesquisaAluno', compact('alunos', 'idTime'));
    }
}
