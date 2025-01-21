<?php

namespace App\Http\Controllers;
use App\Models\Mensagem;
use App\Models\Reserva;
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

    private function gerarMensagemAutomatica($idAluno, $conteudo)
    {
        //Cria a mensagem para enviar ao aluno
        $mensagem = new Mensagem();
        $mensagem->conteudo = $conteudo;
        $mensagem->idAluno = $idAluno;
        $mensagem->dateTime = Carbon::now();
        $mensagem->tipo = 'Sistema';
        $mensagem->save();
    }

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
            $this->gerarMensagemAutomatica($idAluno, 'Você foi adicionado ao time ' .
                $modalidade->nome . ' ' . $time->genero . '. Veja as informações detalhadas na página de times.');
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

    public function verificaLogin(string $id)
    {
        $aluno = Aluno::find($id);
        session_start();
        if (isset($_SESSION['senha'])) {
            if ($_SESSION['senha'] == $aluno->password) {
                return true;
            } else {
                return false;
            }
        }
        return false;

    }
    public function entrarPerfil(Request $request)
    {
        $aluno = Aluno::where('email', $request->input('email'))->first();

        if ($aluno && Hash::check($request->input('password'), $aluno->password)) {
            session_start();
            // Armazena um dado na sessão
            $_SESSION['senha'] = $aluno->password;
            return view("Alunos/verOpcoesAluno", compact('aluno'));
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
            'dateTime' => Carbon::now(),
            'tipo' => 'Professora Gabriela'
        ]);

        return redirect()->route('pesquisarAlunos')->with('success', 'Mensagem enviada com sucesso!');
    }

    public function formEnviarMensagem($idAluno)
    {
        $aluno = Aluno::find($idAluno);

        if (!$aluno) {
            return redirect()->route('pesquisarAlunos')->with('error', 'Aluno não encontrado.');
        }
        $mensagens = Mensagem::where('idAluno', $aluno->id)->orderByDesc('dateTime')->get();
        return view('Mensagens.enviarMensagem', compact('aluno', 'mensagens'));
    }

    public function pesquisarAlunosAjax(Request $request)
    {
        // Pega a pesquisa
        $query = $request->get('query');

        // Realiza a busca
        $alunos = Aluno::where('name', 'LIKE', '' . $query . '%')
            ->orWhere('email', 'LIKE', '' . $query . '%')
            ->get();

        // Retorna a resposta em formato JSON
        return response()->json($alunos);
    }

    public function desvalidarAlunos()
    {
        $alunos = Aluno::all();
        foreach ($alunos as $aluno) {
            $aluno->status = 'espera';
            $aluno->save();
        }
        return redirect()->route('inicio')->with('success', '');
    }

    public function validarCadastro(Request $request)
    {
        $aluno = Aluno::where('email', $request->get('email'))->first();

        if ($aluno && Hash::check($request->get('password'), $aluno->password)) {
            return view("Alunos/telaEspera", compact('aluno'));
        } else {
            return redirect()->route("telaEspera")->with('danger', "Email ou senha inválido(os)!");
        }
    }


    //Todas funcçoes que o user tem acesso
    //////////////////////////////////////////

    //Manda os dados para o aluno ver
    public function mandaDadosAluno(string $id)
    {
        $aluno = Aluno::find($id);
        if ($this->verificaLogin($id)) {
            return view("Alunos/perfilAluno", compact('aluno'));
        }
        return redirect()->route("entrarAluno")->with('danger', "É preciso entrar com seu login primeiro!");
    }

    // Função para mandar o id do aluno para o formulário de criação da reserva
    public function enviarFormReserva(string $id)
    {
        $aluno = Aluno::find($id);
        return view("OpcoesAluno/registrarReserva", compact('aluno'));
    }

    // Função para os alunos que não possuem acesso ao App puderem fazer reservas
    public function store(Request $request)
    {
        $aluno = Aluno::find($request->input('idAluno'));
        if (isset($aluno)) {
            $dados = Reserva::create($request->all());
            return view("Alunos/verOpcoesAluno", compact('aluno'))->with([
                'success' => 'Reserva Cadastrada com sucesso! espere a professora Gabriela aceitá-la',
            ]);
        } else {
            return redirect()->route("entrarAluno")->with('danger', "É preciso entrarcom suua conta para poder realizar uma reserva!");
        }
    }


    // Envia os treinos pro aluno poder fazer checkin
    public function enviarTreinos(string $idAluno)
    {
        $dados = TreinoAmistoso::all();
        foreach ($dados as $item) {
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia)->format('d/m');
            $item->horarioInicio = Carbon::parse($item->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
            $item->horarioFim = Carbon::parse($item->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');

            $modalidade = Modalidade::find($item->idModalidade);
            $item->nomeModalidade = $modalidade->nome;

            $checkin = Chekin::where("idAluno", $idAluno)
                ->where("idTreino", $item->idTreino)
                ->first();

            if ($checkin != null) {
                $item->status = "realizado";
            } else {
                $item->status = "branco";
            }
        }
        return view("OpcoesAluno/realizarCheckin", compact('dados', "idAluno"));
    }

    public function realizarCheckin(string $idAluno, string $idTreino)
    {
        $testeVerificacao = Chekin::where("idAluno", $idAluno)->where("idTreino", $idTreino)->first();
        if (!isset($testeVerificacao)) {
            $dados = new Chekin();
            $dados->idTreino = $idTreino;
            $dados->idAluno = $idAluno;
            $dados->save();
            $treino = TreinoAmistoso::find($idTreino);
            $treino->vagasOcupadas += 1;
            $treino->save();
            return redirect()->route('enviaTreinos', ['idTime' => $idTreino, 'idAluno' => $idAluno]);
        }
    }

    public function cancelarCheckin(string $idAluno, string $idTreino)
    {
        $dados = Chekin::where("idAluno", $idAluno)->where("idTreino", $idTreino);
        $treino = TreinoAmistoso::find($idTreino);
        $treino->vagasOcupadas -= 1;
        $treino->save();
        $dados->delete();
        return redirect()->route('enviaTreinos', ['idTime' => $idTreino, 'idAluno' => $idAluno]);
    }
}
