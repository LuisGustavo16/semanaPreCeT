<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Modalidade;
use Hash;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Time;
use App\Models\AlunosTime;
use Laravel\Sanctum\HasApiTokens;
use Validator;

class controllerAluno extends Controller
{
    use ApiResponse;
    use HasApiTokens;
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

    public function register(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:users',
                'email' => 'required|string|max:255|unique:users',
                'password' => 'required|string',
                'turma' => 'required|string',
                'curso' => 'required|string',
                'matricula' => 'required|string',
                'descricaoEsportiva' => 'string',
                'genero' => 'required|string',
                'dataNascimento' => 'required|string'
            ]);
            if ($validatedData->fails()) {
                return redirect()->route("Cadastrar");
            }
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'turma' => $request->get('turma'),
                'curso' => $request->get('curso'),
                'matricula' => $request->get('matricula'),
                'descricaoEsportiva' => $request->get('descricaoEsportiva'),
                'dataNascimento' => $request->get('dataNascimento'),
                'genero' => $request->get('genero'),
                'tipo' => "aluno",
                'status' => 'espera',
                'password' => Hash::make($request->get('password')),
            ]);
            return view("Alunos/telaEspera");
        } catch (\Throwable $th) {
            return redirect()->route("Cadastrar");
        }
    }

    public function listarAlunosPendentes()
    {
        $dados = User::all()->where('status', 'espera');
        return view('Alunos/listarAlunosPendentes', compact("dados"));
    }
    public function aceitarNegarRegistro($idAluno, $opcao)
    {
        $aluno = User::find($idAluno);
        if ($opcao == "aceitar") {
            $aluno->status = "aceito";
            $aluno->save();
        } else  {
            $aluno->delete();
        }
        return redirect()->route("listarAlunosPendentes");
    }
    

}
