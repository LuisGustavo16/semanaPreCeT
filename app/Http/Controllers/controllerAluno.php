<?php

namespace App\Http\Controllers;
use App\Models\Mensagem;
use App\Models\TreinoAmistoso;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Modalidade;
use Hash;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Time;
use App\Models\Chekin;
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

            //Cria a mensagem para enviar ao aluno
            $time = Time::find($idTime);
            $modalidade = Modalidade::find($time->idModalidade);
            $mensagem = new Mensagem();
            $mensagem->conteudo = 'Você foi adicionado ao time ' . $modalidade->nome . ' ' . $time->genero . 
            ' Veja as informações detalhadas na página de times.';
            $mensagem->idAluno = $dados->idAluno;
            $mensagem->dia = Carbon::now();
            $mensagem->horario = Carbon::now();
            $mensagem->save();
        }
        return redirect()->route('verTime', ['idTime' => $idTime]);
    }

    public function show(string $idAluno)
    {
        $dados = Aluno::find($idAluno);
        /*Formatação da data e calculo da idade*/
        $dataAtual = Carbon::now();
        $dados->idade = $dataAtual->diffInYears($dados->dtNascimento);
        $dados->dtNascimento = Carbon::parse($dados->dtNascimento)->format('d/m/y');
        /*Times do aluno*/
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
        /*Checkins do aluno*/
        $checkins = Chekin::all()->where("idAluno", $idAluno);
        $treinosCheckin = [];
        foreach ($checkins as $item) {
            $treino = TreinoAmistoso::find($item->idTreino);
            $modalidade = Modalidade::find($treino->idModalidade);
            array_push($treinosCheckin, $treino->dia . ' (' . $treino->horarioInicio . ' - ' .
                $treino->horarioFim . ' ' . $treino->local . ', ' . $modalidade->nome . ' ' . $treino->genero);
        }
        if (isset($dados)) {
            return view('Times/verPerfilAluno', compact("dados", "timesAluno", "treinosCheckin"));
        }
    }

    public function listarAlunosPendentes()
    {
        $dados = Aluno::all()->where('status', 'espera');
        return view('Alunos/listarAlunosPendentes', compact("dados"));
    }
    public function aceitarNegarRegistro($idAluno, $opcao)
    {
        $aluno = Aluno::find($idAluno);
        if ($opcao == "aceitar") {
            $aluno->status = "aceito";
            $aluno->save();
        } else {
            $aluno->delete();
        }
        return redirect()->route("listarAlunosPendentes");
    }

    public function entrarPerfil(Request $request)
    {
        $aluno = Aluno::where('email', $request->get('email'))->first();

        if ($aluno && Hash::check($request->get('password'), $aluno->password)) {
            return view("Alunos/perfilAluno", compact('aluno'));
        } else {
            return redirect()->route("entrarAluno")->with('danger', "Email ou senha inválido(os)!");
        }
    }

    public function edit(string $idAluno)
    {
        $aluno = Aluno::find($idAluno);
        return view("Alunos/editarPerfilAluno", compact('aluno'));
    }

    public function update(Request $request, string $idAluno)
    {

        try {
            $aluno = Aluno::find($idAluno);
            $aluno->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'turma' => $request->get('turma'),
                'curso' => $request->get('curso'),
                'matricula' => $request->get('matricula'),
                'descricaoEsportiva' => $request->get('descricaoEsportiva'),
                'dataNascimento' => $request->get('dataNascimento'),
                'genero' => $request->get('genero'),
                'tipo' => $aluno->tipo,
                'status' => $aluno->status,
            ]);
            return view("Alunos/perfilAluno", [
                'aluno' => $aluno,
                'success' => "Perfil editado com sucesso!"
            ]);
        } catch (\Throwable $th) {
            $aluno = Aluno::find($idAluno);
            return view("Alunos/perfilAluno", [
                'aluno' => $aluno,
                'danger' => "Erro ao editar perfil!"
            ]);
        }
    }


    /*teste <mensagens>*/
    // listar e pesquisar alunos
    public function pesquisarAlunos(Request $request)
{
    $query = $request->get('query');
    $alunos = Aluno::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('email', 'LIKE', '%' . $query . '%')
        ->get();

    return view('Mensagens.pesquisarAlunos', compact('alunos'));
}

//enviar mensagens
public function enviarMensagem(Request $request, string $idAluno)
{
    $request->validate([
        'conteudo' => 'required|string|max:500',
    ]);

    Mensagem::create([
        'idAluno' => $idAluno,
        'conteudo' => $request->conteudo,
        'dia' => now()->format('Y-m-d'),
        'horario' => now()->format('H:i:s'),
    ]);

    return redirect()->route('pesquisarAlunos')->with('success', 'Mensagem enviada com sucesso!');
}

public function formEnviarMensagem($idAluno)
{
    $aluno = Aluno::find($idAluno);

    if (!$aluno) {
        return redirect()->route('pesquisarAlunos')->with('error', 'Aluno não encontrado.');
    }

    return view('Mensagens.enviarMensagem', compact('aluno'));
}

public function pesquisarAlunosAjax(Request $request)
{
    // Pega a pesquisa
    $query = $request->get('query');
    
    // Realiza a busca
    $alunos = Aluno::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('email', 'LIKE', '%' . $query . '%')
        ->get();

    // Retorna a resposta em formato JSON
    return response()->json($alunos);
}


}
