<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\JogosTimes;
use App\Models\Time;
use App\Models\Modalidade;
use App\Models\AlunosTime;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
class TimeController extends Controller
{
    use ApiResponse;
    use HasApiTokens;
    public function index(Request $request)
    {
        $idTimes = AlunosTime::where("idAluno", $request->get("idAluno"))->get();
        $times = [];
        foreach ($idTimes as $item) {
            $dados = Time::find($item->idTime);
            $modalidade = Modalidade::find($dados->idModalidade);
            $dados->modalidade = $modalidade->nome;
            array_push($times, $dados);
        }
        return response()->json([
            'times' => $times
        ]);
    }

    public function indexJogos(Request $request)
    {
        try {
            $jogos = JogosTimes::where("idTime", $request->get("idTime"))->get();
            foreach ($jogos as $item) {
                /*Trocar o formato do dia e do horário*/
                $item->dia = Carbon::parse($item->dia)->format('d/m');
                $item->horarioInicio = Carbon::parse($item->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
                $item->horarioFim = Carbon::parse($item->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
            }
            $time = Time::find($request->get('idTime'));
            $modalidade = Modalidade::find($time->idModalidade);
            return response()->json([
                'jogos' => $jogos,
                'time' => $time,
                'modalidade' => $modalidade
            ]);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function indexAlunos(Request $request)
    {
        try {
            $alunosTimes = AlunosTime::where("idTime", $request->get("idTime"))->get();
            $alunos = [];
            foreach ($alunosTimes as $item) {
                $dados = Aluno::find($item->idAluno);
                array_push($alunos, $dados);
            }
            return response()->json([
                'alunos' => $alunos
            ]);
        } catch (Exception $e) {
            return $e;
        }
    }
}
