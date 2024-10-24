<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Modalidade;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Time;
use App\Models\AlunosTime;

class controllerAluno extends Controller
{

    public function adicionaAlunoTime(string $idAluno, string $idTime)
    {
        $verificador = AlunosTime::where('idAluno', $idAluno)->where('idTime', $idTime)->first();
        if (!isset($verificador)) {
            $dados = new AlunosTime();
            $dados->idAluno = $idAluno;
            $dados->idTime = $idTime;
            $dados->save();
        }
        return redirect()->route('verTime', ['idTime' => $idTime]);
    }

    public function show (string $idAluno) {
        $dados = Aluno::find($idAluno );
        /*Formatação da data e calculo da idade*/
        $dataAtual = Carbon::now();
        $dados->idade = $dataAtual->diffInYears($dados->dtNascimento);
        $dados->dtNascimento = Carbon::parse($dados->dtNascimento)->format('d/m/y');
        /*Chekins e Times de cada aluno*/
        $alunos_time = AlunosTime::all()->where('idAluno', $idAluno);
        $times = Time::all();
        $timesAluno = [];
        foreach ($alunos_time as $item) {
            foreach ($times as $time) {
                if ($item->idTime == $time->idTime) {
                    $modalidade = Modalidade::find($time->idModalidade);
                    array_push($timesAluno, $modalidade->nome . " " . $time->genero . " - " . $time->competicao);
                }
            }
        }
        if (isset($dados)) {
            return view('Alunos/verPerfilAluno', compact("dados", "timesAluno"));
        }
    }

}
